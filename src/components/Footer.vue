<template>
  <footer class="footer" aria-label="Site Footer">
    <div class="page-container">
      <p>Copyright © 2010 - 2022 Rowmark, LLC. - All rights reserved</p>
    </div>
  </footer>
</template>

<style scoped lang="scss">
.footer {
  height: 78px;
  background: #464646;
  display: flex;
  margin-top: auto;
  font-size: 12px;
  line-height: 15px;
  color: white;
}

.page-container {
  display: flex;
  justify-content: flex-end;
  align-items: center;

  p {
    margin-right: 15px;
  }
}

@media (max-width: 576px) {
  .footer {
    padding: 0 8px;
  }
}
</style>
