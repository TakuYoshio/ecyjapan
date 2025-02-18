<template>
  <div class="main-wrap">
    <div v-if="error.statusCode === 404" class="error-container" :style="style">
      <div class="error-fkv">
        <div class="error-fkv-logo">
          <nuxt-img :src="projectIcon" preset="primary" sizes="md:120px lg:160px" width="160px" class="project-logo" alt="Project Logo" />
        </div>
        <h1 class="error-fkv-title-en" :style="style">NOT FOUND</h1>
        <h2 class="error-fkv-title-jp">ご指定のページが見つかりませんでした</h2>
        <div class="error-fkv-text">
          お客様がアクセスしようとしたページは、掲載期間が終了し削除されたか、<br>
          別の場所に移動された可能性があります。
        </div>
        <NuxtLink to="/" class="backToTop-button" :style="style">トップへ戻る</NuxtLink>
      </div>
      <div class="sitemap-container">
        <div class="sitemap-contents article-area">
          <h3 class="sitemap-title">ARTICLE(エリア)</h3>
          <div class="list-section">
            <ul v-for="region in regionsWithPrefectures" :key="region.id">
              <li class="list-heading">
                <nuxt-link :to="`/articles/search?region_id=${region.id}`">{{ region.name }}</nuxt-link>
              </li>
              <ul class="list-group">
                <li v-for="prefecture in region.prefectures" :key="prefecture" class="list-item">
                  <nuxt-link :to="`/articles/search?region_id=${region.id}&prefecture_id=${prefecture.id}`">{{ prefecture.name }}</nuxt-link>
                </li>
              </ul>
            </ul>
          </div>
        </div>
        <div class="sitemap-contents article-category-tag">
          <h3 class="sitemap-title">ARTICLE</h3>
          <p>{{ categoryList }}</p>
          <ul>
            <li v-for="category in categoryList" :key="category.id">
              <nuxt-link :to="`/articles/search?category_id=${category.id}`">{{ category.name }}</nuxt-link>
            </li>
          </ul>
        </div>
        <div class="companyOther">
          <div class="sitemap-contents">
            <h3 class="sitemap-title">OTHER</h3>
            <div v-for="(link, index) in sitemapLinks" :key="index">
              <nuxt-link :to="link.href">{{ link.label }}</nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="fkv-error">
      <h1 class="Text-lg">
        {{ otherError }}
      </h1>
    </div>
  </div>
</template>

<script>
import { regionsMaster, prefecturesMaster } from '../constants'
export default {
  name: 'EmptyLayout',
  layout: 'default',
  props: {
    error: {
      type: Object,
      default: null,
    },
  },
  data() {
    return {
      pageNotFound: '404 Not Found',
      otherError: 'An error occurred',
      categoryList: [],
      tagList: [],
      sitemapLinks: [
        { label: '運営会社概要', href: '/company' },
        { label: 'プライバシーポリシー', href: '/privacypolicy' },
        { label: '掲載希望の方はこちら', href: '/lp' },
      ],
    }
  },
  async asyncData({ error, $microcms }) {
    const [ { contents: categories }, { contents: tags }] = await Promise.all([
      $microcms.get({
        endpoint: 'categories',
        queries: { limit: 999 },
      }),
      $microcms.get({
        endpoint: 'child_tags',
        queries: { limit: 999 },
      })
    ])
    return {
      categoryList: categories,
      tagList: tags,
    }
  },
  head() {
    const title =
      this.error.statusCode === 404 ? this.pageNotFound : this.otherError
    return {
      title,
    }
  },
  computed: {
    projectIcon() {
      return this.$PROJECT_NAME === 'キャバチャン'
        ? '/images/kyabachan-logo.webp'
        : '/images/congirl-logo.webp'
    },
    style() {
      return {
        '--base-color': this.$BASE_COLOR,
        '--base-middle-color': this.$BASE_MIDDLE_COLOR,
        '--bg-color':  this.$PROJECT_NAME === 'キャバチャン' ? '#FFEFF9' : '#fff2ea',
      }
    },
    regionsWithPrefectures() {
      return regionsMaster.map(region => ({
        id: region.id,
        name: region.name,
        prefectures: prefecturesMaster
          .filter(prefecture => prefecture.region_id === region.id)
          .map(prefecture => ({
            id:prefecture.id,
            name:prefecture.full_name,
          })),
      }))
    },
  },
}
</script>
<style lang="scss" scoped>
@import '../assets/scss/_mixin';
  ul {
    list-style: none;
    text-decoration: none;
  }
  a {
    text-decoration: none;
    color: #727272;
  }
  .main-wrap {
    max-width: 920px;
    margin: 0 auto;
  }
  .error-container {
    margin: 0 auto;
    width: 100%;
    .error-fkv {
      display: flex;
      flex-direction: column;
      padding: 56px 0;
      border-bottom: 1px solid var(--base-color);
      width: 100%;
      gap: 16px;
      text-align: center;
      .error-fkv-title-en {
        font-size: 72px;
        color: var(--base-middle-color);
        font-weight: 700;
      }
      .error-fkv-title-jp {
        font-size: 24px;
      }
      .error-fkv-text {
        font-size: 16px;
        line-height: 1.6;
      }
      a.backToTop-button {
        font-weight: 600;
        color: #fff;
        text-decoration: none;
        background-color: var(--base-color);
        padding: 12px 24px;
        display: inline-block;
        width: fit-content;
        border-radius: 100px;
        margin: 0 auto;
        &::before {
          content: '';
          display: inline-block;
          width: 24px;
          height: 24px;
          background: url('/images/left_line.svg') no-repeat;
          background-size: contain;
          vertical-align: middle;
        }
      }
    }
    .sitemap-container {
      margin-top: 56px;
      display: grid;
      gap: 40px;
    }
    .sitemap-title {
      font-size: 16px;
      color: var(--base-color);
      margin-bottom: 12px;
    }
    .list-section {
      display: flex;
      flex-wrap: wrap;
      row-gap: 32px;
      & > ul {
        width: 20%;
      }
    }
    .list-heading, .list-item {
      position: relative;
      color: #727272;
      padding-left: 20px;
    }
    .list-heading {
      font-size: 16px;
    }
    .list-item {
      font-size: 14px;
    }
    .list-heading::before, .list-item::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 12px;
      height: 2px;
      background-color: #727272;
      border-radius: 2px;
    }
  }
</style>
