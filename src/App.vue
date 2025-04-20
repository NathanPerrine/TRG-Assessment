<script setup lang="ts">
import Footer from "./components/Footer.vue";
import { ref, onMounted } from "vue";

const newsItems = ref([]);
const loading = ref(true);

onMounted(async () => {
  try {
    const response = await fetch("http://rowmark-craft.ddev.site/api/news");
    const data = await response.json();
    newsItems.value = data.data;
  } catch (err) {
    console.error("Error fetching news: ", err);
  } finally {
    loading.value = false;
  }
});
</script>

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
          <div class="logo" role="presentation"></div>
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
            Rowmark's people are what make the difference.
          </p>
        </div>

        <div class="right-column">
          <div class="news-card">
            <div class="news-header">
              <h2>LATEST NEWS</h2>
            </div>
            <div v-if="loading" class="news-loading">Loading news...</div>
            <ul v-else class="news-feed">
              <li v-for="(item, index) in newsItems" :key="index">
                <h3>{{ item.title }}</h3>
                <p>{{ item.content }}</p>
                <a
                  :href="`/news/${item.slug}`"
                  class="read-more"
                  :aria-label="`Read more about ${item.title}`"
                  >Read More</a
                >
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

<style scoped lang="scss">
// Breakpoints
$breakpoint-large: 1275px;
$breakpoint-medium: 992px;
$breakpoint-small: 768px;
$breakpoint-xsmall: 576px;

// Color Variables
$color-white: #ffffff;
$color-almost-white: #fcfcfc;
$color-shadow: #00000029;
$color-hero-blue: #005a9c;
$color-dark-gray: #707070;
$color-subtitle-gray: #5a5a5a;
$color-header-dark-blue: #003475;
$color-button-blue: #075a94;

.page {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  overflow-x: hidden;
}

.hero {
  position: relative;
  background: url("/rowmark_buildingfront.jpg") center 35% / cover no-repeat;
  height: 50vh;
  display: flex;
  align-items: center;
  padding-left: 5%;

  .hero-overlay {
    position: absolute;
    inset: 0;
    background-color: rgba(0, 90, 156, 0.6);
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
      color: $color-white;
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
      width: 268px;
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
      color: $color-header-dark-blue;
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
      color: $color-subtitle-gray;
      margin: 0;
      text-align: left;
    }

    .project-body {
      font-style: normal;
      font-weight: 400;
      font-size: 20px;
      line-height: 24px;
      color: $color-dark-gray;
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
      background: $color-almost-white;
      box-shadow: 0px 3px 3px $color-shadow;
      border-radius: 0px 13px 13px 13px;
      overflow: hidden;
      position: absolute;
      top: -480px;
      right: 0;
      margin-right: 15px;
      width: 536px;
      min-height: 700px;
      z-index: 5;

      .news-header {
        background: $color-hero-blue;
        height: 102px;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        border: 4px solid $color-white;
        border-radius: 0px 15px 15px 15px;

        h2 {
          font-style: italic;
          font-weight: 300;
          font-size: 47px;
          line-height: 56px;
          color: $color-white;
          text-shadow: 0px 3px 6px $color-shadow;
        }
      }

      .news-loading {
        padding: 2rem;
        text-align: center;
        font-style: italic;
        color: $color-dark-gray;
        border-radius: 0 0 13px 13px;
        font-size: 1.2rem;
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
            color: $color-hero-blue;
            text-align: left;
          }

          p {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            color: $color-dark-gray;
            text-align: left;
          }

          .read-more {
            align-self: flex-start;
            background: $color-button-blue;
            color: $color-white;
            border: none;
            border-radius: 2px;
            padding: 0.5rem 1rem;
            font-weight: bold;
            font-size: 16px;
            line-height: 19px;
            text-align: left;
            text-transform: uppercase;
            text-decoration: none;
          }
        }
      }
    }
  }
}

// Medium Desktop/Small Desktop breakpoint
@media (max-width: $breakpoint-large) {
  .hero {
    .hero-content {
      h1 {
        font-size: 55px;
        line-height: 65px;
      }
    }
  }

  .main-content {
    padding-left: 2rem;

    .left-column {
      max-width: 400px;
      padding: 0 2rem;
      top: -94px;

      .logo {
        height: 180px;
        width: 180px;
      }

      .project-header {
        font-size: 32px;
        line-height: 38px;
      }

      .project-subtitle {
        font-size: 22px;
        line-height: 26px;
      }

      .project-body {
        font-size: 18px;
        line-height: 22px;
      }
    }

    .right-column {
      .news-card {
        width: 450px;
        top: -450px;

        .news-header {
          height: 90px;

          h2 {
            font-size: 40px;
            line-height: 48px;
          }
        }
      }
    }
  }
}

// Tablet breakpoint
@media (max-width: $breakpoint-medium) {
  .hero {
    height: 40vh;

    .hero-content {
      max-width: 100%;

      h1 {
        font-size: 45px;
        line-height: 55px;
      }
    }
  }

  .main-content {
    flex-direction: column;
    padding-left: 1rem;

    .left-column {
      max-width: 100%;
      top: -92px;
      padding: 0 1rem;
      margin-bottom: 0;

      .project-header {
        font-size: 28px;
        line-height: 34px;
        height: auto;
      }

      .project-subtitle {
        font-size: 20px;
        line-height: 24px;
      }

      .project-body {
        font-size: 16px;
        line-height: 20px;
      }
    }

    .right-column {
      .news-card {
        position: relative;
        top: 0;
        width: 100%;
        max-width: 600px;
        margin: 2rem auto;

        .news-header {
          height: 80px;

          h2 {
            font-size: 34px;
            line-height: 40px;
          }
        }
      }
    }
  }
}

// Mobile breakpoint
@media (max-width: $breakpoint-small) {
  .hero {
    height: 35vh;
    padding-left: 0;
    justify-content: center;

    .hero-content {
      max-width: 90%;
      text-align: center;

      h1 {
        font-size: 32px;
        line-height: 38px;
      }

      p {
        font-size: 1rem;
        text-align: center;
      }
    }
  }

  .main-content {
    padding-left: 0;

    .left-column,
    .right-column {
      width: 90%;
      max-width: 90%;
      padding: 0;
      margin: 0 auto;
    }

    .left-column {
      top: -94px;
      padding: 0;
      align-items: center;
      text-align: center;

      .project-header {
        font-size: 24px;
        line-height: 30px;
        text-align: center;
      }

      .project-subtitle {
        font-size: 18px;
        line-height: 22px;
        text-align: center;
      }

      .project-body {
        font-size: 14px;
        line-height: 18px;
        text-align: center;
      }
    }

    .right-column {
      .news-card {
        width: 100%;

        .news-header {
          height: 70px;

          h2 {
            font-size: 26px;
            line-height: 30px;
            width: 100%;
            text-align: center;
          }
        }

        .news-feed {
          padding: 1rem;

          li {
            h3 {
              font-size: 18px;
              line-height: 22px;
              text-align: center;
            }

            p {
              font-size: 14px;
              line-height: 18px;
              text-align: center;
            }

            .read-more {
              align-self: center;
              font-size: 14px;
              padding: 0.4rem 0.8rem;
            }
          }
        }
      }
    }
  }
}

// Extra Small Mobile breakpoint
@media (max-width: $breakpoint-xsmall) {
  .hero {
    height: 30vh;

    .hero-content {
      h1 {
        font-size: 26px;
        line-height: 32px;
      }
    }
  }

  .main-content {
    .left-column {
      top: -95px;

      .project-header {
        font-size: 20px;
        line-height: 26px;

        .project-version {
          font-size: 16px;
        }
      }

      .project-subtitle {
        font-size: 16px;
        line-height: 20px;
      }
    }

    .right-column {
      .news-card {
        .news-header {
          height: 60px;

          h2 {
            font-size: 22px;
            line-height: 26px;
          }
        }

        .news-feed {
          li {
            margin-bottom: 1.5rem;

            h3 {
              font-size: 16px;
              line-height: 20px;
            }

            p {
              font-size: 13px;
              line-height: 16px;
            }
          }
        }
      }
    }
  }
}
</style>
