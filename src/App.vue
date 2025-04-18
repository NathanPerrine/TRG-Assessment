<template>
  <div class="page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>You Don't Know<br /> What You Don't Know</h1>
      </div>
    </section>

    <!-- Main Content Section -->
    <section class="main-content">
      <div class="left-column">
        <img src="/Rowmark-R.svg" alt="Rowmark Logo" class="logo" />
        <h2>About Us</h2>
        <p>Some informational text about Rowmark or the company here.</p>
      </div>

      <div class="right-column">
        <div class="news-card">
          <div class="news-header">
            <h2>LATEST NEWS</h2>
          </div>
          <ul class="news-feed">
            <li v-for="(item, index) in newsItems" :key="index">
              <h3>{{ item.title }}</h3>
              <p>{{ item.content }}</p>
              <button class="read-more">Read More</button>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <p>© 2025 Rowmark</p>
    </footer>
  </div>
</template>

<script setup lang="ts">
const newsItems = [
  {
    title: "News Title",
    content:
      "Rowmark LLC introduces The Naturals product line, an authentic, nature-inspired, textured engravable sheet product. The Naturals not only look like they came right from the outdoors, but they feel like it too. And just like their real-life counterparts,…",
  },
  {
    title: "News Title",
    content:
      "Rowmark LLC introduces The Naturals product line, an authentic, nature-inspired, textured engravable sheet product. The Naturals not only look like they came right from the outdoors, but they feel like it too. And just like their real-life counterparts,…",
  },
  {
    title: "News Title",
    content:
      "Rowmark LLC introduces The Naturals product line, an authentic, nature-inspired, textured engravable sheet product. The Naturals not only look like they came right from the outdoors, but they feel like it too. And just like their real-life counterparts,…",
  },
  {
    title: "News Title",
    content:
      "Rowmark LLC introduces The Naturals product line, an authentic, nature-inspired, textured engravable sheet product. The Naturals not only look like they came right from the outdoors, but they feel like it too. And just like their real-life counterparts,…",
  },
];
</script>

<style scoped lang="scss">
.page {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  overflow-x: hidden;
}

/* Hero */
.hero {
  position: relative;
  background: url("/rowmark_buildingfront.jpg") center/cover no-repeat;
  height: 50vh;
  display: flex;
  align-items: center;
  padding-left: 5%;
  color: white;

  .hero-overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 51, 153, 0.6); /* A blue tint */
    z-index: 1;
  }

  .hero-content {
    position: relative;
    z-index: 2;
    max-width: 50%;
    padding: 0 1rem;
    text-align: center;

    h1 {
      font-style: italic;
      font-weight: 400;
      font-size: 65px;
      line-height: 78px;
      color: #ffffff;
      margin: 0;
    }

    p {
      font-size: 1.2rem;
      text-align: left;
    }
  }
}

/* Main Content */
.main-content {
  display: flex;
  flex: 1;
  padding: 4rem 5%;
  background: #f4f4f4;
  gap: 2rem;
  position: relative;

  .left-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1rem;

    .logo {
      width: 120px;
      margin-bottom: 1rem;
    }
  }

  .right-column {
    flex: 1;
    position: relative;

    .news-card {
      background: #fcfcfc;
      box-shadow: 0px 3px 3px #00000029;
      border-radius: 0px 13px 13px 13px;
      overflow: hidden;
      position: absolute;
      top: -580px;
      right: 50;
      width: 536px;
      z-index: 5;

      .news-header {
        background: #005a9c;
        height: 102px;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        border: 4px solid #ffffff;
        border-radius: 0px 15px 15px 15px;
        text-align: left;

        h2 {
          font-style: italic;
          font-weight: 300;
          font-size: 47px;
          line-height: 56px;
          color: white;
          text-shadow: 0px 3px 6px #00000029;
        }
      }

      .news-feed {
        list-style: none;
        padding: 1.5rem;
        margin: 0;

        li {
          margin-bottom: 1rem;
          display: flex;
          flex-direction: column;
          gap: 0.5rem;

          h3 {
            margin: 0;
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
            line-height: 27px;
            color: #005a9c;
            text-align: left;
          }

          p {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            color: #707070;
            text-align: left;
          }

          .read-more {
            align-self: flex-start;
            background: #075a94;
            color: white;
            border: none;
            border-radius: 2px;
            padding: 0.5rem 1rem;
            font-weight: bold;
            font-size: 16px;
            line-height: 19px;
            cursor: pointer;
            text-align: left;
          }
        }
      }
    }
  }
}

/* Footer */
.footer {
  text-align: center;
  padding: 1rem;
  background: #003399;
  color: white;
}
</style>
