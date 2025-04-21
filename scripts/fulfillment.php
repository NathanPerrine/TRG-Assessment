<?php

// Fetch and decode inventory from API
function fetchInventory(string $url): array
{
  $inventoryJson = @file_get_contents($url);

  if ($inventoryJson === false) {
    die("Error: Unable to fetch inventory data from API.\n");
  }

  $inventoryData = json_decode($inventoryJson, true);

  if ($inventoryData === null) {
    die("Error: Failed to decode inventory JSON.\n");
  }

  return $inventoryData;
}

// Process customer order into fulfillment plan
function processOrder(array &$inventoryData, array $customerOrder, string $closestWarehouse): array
{
  $fulfillmentPlan = [];

  foreach ($customerOrder as $sku => $quantityOrdered) {
    $plan = [
      'sku' => $sku,
      'fulfilled' => [],
      'backordered' => 0
    ];

    if (!isset($inventoryData[$sku])) {
      $plan['backordered'] = $quantityOrdered;
      $fulfillmentPlan[] = $plan;
      continue;
    }

    $availableInventory = $inventoryData[$sku];
    $remaining = $quantityOrdered;

    // Fulfill from closest warehouse first
    if (isset($availableInventory[$closestWarehouse]) && $availableInventory[$closestWarehouse] > 0) {
      $available = $availableInventory[$closestWarehouse];

      if ($available >= $remaining) {
        $plan['fulfilled'][] = ['warehouse' => $closestWarehouse, 'quantity' => $remaining];
        $inventoryData[$sku][$closestWarehouse] -= $remaining;
        $remaining = 0;
      } else {
        $plan['fulfilled'][] = ['warehouse' => $closestWarehouse, 'quantity' => $available];
        $inventoryData[$sku][$closestWarehouse] = 0;
        $remaining -= $available;
      }
    }

    // Fulfill from other warehouses if needed
    if ($remaining > 0) {
      foreach ($availableInventory as $warehouse => $stock) {
        if ($warehouse === $closestWarehouse) {
          continue;
        }

        if ($stock <= 0) {
          continue;
        }

        if ($stock >= $remaining) {
          $plan['fulfilled'][] = ['warehouse' => $warehouse, 'quantity' => $remaining];
          $inventoryData[$sku][$warehouse] -= $remaining;
          $remaining = 0;
          break;
        } else {
          $plan['fulfilled'][] = ['warehouse' => $warehouse, 'quantity' => $stock];
          $inventoryData[$sku][$warehouse] = 0;
          $remaining -= $stock;
        }
      }
    }

    // If still remaining, backorder
    if ($remaining > 0) {
      $plan['backordered'] = $remaining;
    }

    $fulfillmentPlan[] = $plan;
  }

  return $fulfillmentPlan;
}

// Print final fulfillment plan
function printFulfillmentPlan(array $fulfillmentPlan, array $customerOrder): void
{
  echo "\n=== Final Fulfillment Plan ===\n";
  foreach ($fulfillmentPlan as $plan) {
    echo "SKU: {$plan['sku']}\n";
    echo "  - Ordered: {$customerOrder[$plan['sku']]} units\n";

    foreach ($plan['fulfilled'] as $fulfill) {
      echo "  - Fulfilled {$fulfill['quantity']} units from {$fulfill['warehouse']}\n";
    }

    if ($plan['backordered'] > 0) {
      echo "  - Backordered: {$plan['backordered']} units\n";
    }

    echo "\n";
  }
}

// ===== Main Program =====

// Config
$inventoryApiUrl = 'https://api.rowmark.com/codeTest/inventory';
$closestWarehouse = 'OH20';
$customerOrder = [
  'MUGS-S1-CS' => 1,
  'ROW-UG-SHT' => 3,
  'BIT-14-EA' => 5,
  'CUSTOM-EA' => 50
];

$inventoryData = fetchInventory($inventoryApiUrl);
$fulfillmentPlan = processOrder($inventoryData, $customerOrder, $closestWarehouse);
printFulfillmentPlan($fulfillmentPlan, $customerOrder);
