<template>
  <div>
    <md-field :class="messageClass">
      <label>Permissão</label>
      <md-input v-model="role.name" required></md-input>
      <span class="md-error">There is an error</span>
    </md-field>
    <md-field :class="messageClass">
      <label>Slug</label>
      <md-input v-model="role.slug" required></md-input>
      <span class="md-error">There is an error</span>
    </md-field>

    <md-field :class="messageClass">
      <label>Descrição</label>
      <md-textarea v-model="role.description" required></md-textarea>
      <span class="md-helper-text">Helper text</span>
      <span class="md-error">There is an error</span>
    </md-field>

    <md-button @click="save" type="button" class="md-raised md-primary"
      >Save</md-button
    >
  </div>
</template>

<script>
export default {
  name: "add-perm",
  data() {
    return {
      role: {
        slug: null,
        name: null,
        description: null,
      },
      noError: null,
      hasMessages: false,
    }
  },
  methods: {
    save () {
      requestPost("/role/save", this.role).then((resp) => {
        if (resp.status !== 200) {
          this.hasMessages = true;
          return null;
        }
      });
    },
  },
  computed: {
    messageClass() {
      return {
        "md-invalid": this.hasMessages,
      };
    },
  },
};
</script>