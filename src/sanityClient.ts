import { createClient } from "@sanity/client"

const client = createClient({
    projectId: "0hec0bys",
    dataset: "production",
    apiVersion: "2024-09-01",
    useCdn: true,
})

export default client;