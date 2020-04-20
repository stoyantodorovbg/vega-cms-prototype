<template>
    <li class="nav-item dropdown dropdown-themes">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <i class="fas fa-cogs"></i>
            Settings
            <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <div class="dropdown-title">Themes</div>
            <div class="options-wrapper">
                <div v-for="(theme, index) in themes" :key="theme.id">
                    <button @click="changeTheme(index)"
                            class="btn-themes" :style="{ backgroundColor: theme.color }"
                            :title="theme.name">
                    </button>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
   import EventBus from "../../eventBus";

  export default {
    name: "ThemeManager",

    data() {
      return {

        //TODO Move data into JSON file
        themes: [
          {
            id: 0,
            slug: 'theme-green',
            name: 'Green',
            color: '#3cba92'
          },
          {
            id: 1,
            slug: 'theme-royal',
            name: 'Royal',
            color: '#243b55'
          },
          {
            id: 2,
            slug: 'theme-purple-dark',
            name: 'Purple Dark',
            color: '#4e4376'
          },
          {
            id: 2,
            slug: 'theme-pink',
            name: 'Pink',
            color: '#c471f5'
          },
        ]
      }
    },

    methods: {
      changeTheme(getThemeIndex) {
        this.themes.map((item, index) => {
          if (getThemeIndex === index) {
              EventBus.$emit('changeTheme', item.slug);
          }
        });

      }
    },
  }
</script>

<style scoped>

</style>
