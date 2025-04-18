<template>
  <div class="page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-overlay"></div>
      <div class="page-container">
        <div class="hero-content">
          <h1>
            You Don't Know<br />
            What You Don't Know
          </h1>
        </div>
      </div>
    </section>

    <!-- Main Content Section -->
    <div class="page-container">
      <section class="main-content">
        <div class="left-column">
          <div class="logo"></div>
          <h2 class="project-header">
            Coding Test <span class="project-version">v</span>2.0.1
          </h2>
          <p class="project-subtitle">The difference is in the details</p>
          <p class="project-body">
            Rowmark always has been and always will be a company built around
            people. From our highly skilled production, quality and engineering
            teams to our talented sales, marketing, finance and customer support
            personnel,
          </p>
          <p class="project-body project-body-bold">
            Rowmark’s people are what make the difference.
          </p>
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
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script setup lang="ts">
import Footer from "./components/Footer.vue";

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

.main-content {
  display: flex;
  justify-content: space-between;
  padding-left: 3rem;

  .left-column {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    position: relative;
    top: -108px;
    max-width: 600px;
    padding: 0 4rem;

    .logo {
      height: 209px;
      width: 200px;
      background: transparent url("/Rowmark-R.svg") center center no-repeat;
      background-size: contain;
      opacity: 1;
      z-index: 2;
    }

    .project-header {
      font-style: normal;
      font-weight: bold;
      font-size: 36px;
      line-height: 44px;
      color: #003475;
      margin: 0;
      text-align: left;
      height: 38px;

      .project-version {
        font-weight: 300;
        font-size: 24px;
        margin-left: 0.5rem;
      }
    }

    .project-subtitle {
      font-style: italic;
      font-weight: 300;
      font-size: 25px;
      line-height: 30px;
      color: #5a5a5a;
      margin: 0;
      text-align: left;
    }

    .project-body {
      font-style: normal;
      font-weight: 400;
      font-size: 20px;
      line-height: 24px;
      color: #707070;
      text-align: left;
      margin: 0;
      margin-top: 1rem;
    }

    .project-body-bold {
      font-weight: bold;
      margin-top: 1rem;
    }
  }

  .right-column {
    position: relative;

    .news-card {
      background: #fcfcfc;
      box-shadow: 0px 3px 3px #00000029;
      border-radius: 0px 13px 13px 13px;
      overflow: hidden;
      position: absolute;
      top: -480px;
      right: 0;
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
            text-transform: uppercase;
          }
        }
      }
    }
  }
}
</style>
