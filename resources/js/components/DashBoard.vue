<template>
  <div class="page-container">
    <md-app md-mode="reveal">
      <md-app-toolbar class="md-primary">
        <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
          <md-icon>menu</md-icon>
        </md-button>
        <span class="md-title">App Material</span>

        <div class="md-toolbar-section-end">
          <md-menu md-size="big" md-direction="bottom-end">
            <md-button class="md-icon-button" md-menu-trigger>
              <md-icon>near_me</md-icon>
            </md-button>
            <md-menu-content>
              <md-menu-item>
                <span>{{ user }}</span>
                <md-icon>near_me</md-icon>
              </md-menu-item>
              <md-menu-item @click="logout">
                <span>Logout</span>
                <md-icon>logout</md-icon>
              </md-menu-item>
            </md-menu-content>
          </md-menu>
        </div>
      </md-app-toolbar>

      <md-app-drawer :md-active.sync="menuVisible">
        <md-toolbar class="md-transparent" md-elevation="0"
          >Navigation</md-toolbar
        >

        <md-list>
          <md-list-item md-expand >
            <md-icon>whatshot</md-icon>
            <span class="md-list-item-text">ACL</span>

            <md-list slot="md-expand">
              <md-list-item @click="addPerm" class="md-inset">ADD Permission</md-list-item>
              <md-list-item @click="addGroup" class="md-inset">Groups</md-list-item>
              <md-list-item @click="addUserGroup" class="md-inset">User Groups</md-list-item>
              <md-list-item @click="addRole" class="md-inset">Role</md-list-item>
            </md-list>
          </md-list-item>

          <md-list-item md-expand>
            <md-icon>videogame_asset</md-icon>
            <span class="md-list-item-text">Games</span>

            <md-list slot="md-expand">
              <md-list-item class="md-inset">Console</md-list-item>
              <md-list-item class="md-inset">PC</md-list-item>
              <md-list-item class="md-inset">Phone</md-list-item>
            </md-list>
          </md-list-item>

          <md-list-item md-expand>
            <md-icon>video_library</md-icon>
            <span class="md-list-item-text">Video</span>

            <md-list slot="md-expand">
              <md-list-item class="md-inset">Humor</md-list-item>
              <md-list-item class="md-inset">Music</md-list-item>
              <md-list-item class="md-inset">Movies</md-list-item>
              <md-list-item class="md-inset">TV Shows</md-list-item>
            </md-list>
          </md-list-item>

          <md-list-item>
            <md-icon>shopping_basket</md-icon>
            <span class="md-list-item-text">Shop</span>
          </md-list-item>
        </md-list>
      </md-app-drawer>

      <md-app-content>
        <slot name="content"></slot>
      
      </md-app-content>
    </md-app>
  </div>
</template>

<style lang="scss" scoped>
.md-app {
  max-height: calc(90vw - 80px);
  border: 1px solid rgba(#000, 0.12);
}

.md-drawer {
  width: 230px;
  height: calc(100vw - 125px);
}
.md-menu,
.toggle {
  margin: 24px;
}
</style>

<script>
export default {
  name: "dash",
  data: () => ({
    menuVisible: false,
  }),
  methods: {
    toggle() {
      alert("Clicado");
    },
    addPerm() {
      window.location.href = "/permission/add";
    },
    addGroup() {
      window.location.href = "/group/add";
    },
    addUserGroup() {
      window.location.href = "/group/user/add";
    },
    addRole() {
      window.location.href = "/role/add";
    },
    logout() {
      requestPost(this.url_logout, {}).then(
        (json) => (window.location.href = "/home")
      );
    },
  },
  props: {
    user: String,
    url_logout: String,
  },
};
</script>