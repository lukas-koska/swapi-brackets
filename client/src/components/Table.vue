<template>
  <table class="table">
    <thead>
      <slot name="columns">
        <tr>
          <th v-for="column in columns" :key="column">{{column}}</th>
        </tr>
      </slot>
    </thead>
    <tbody>
    <tr v-for="(item, index) in data" :key="index">
      <slot :row="item">
        <td v-for="column in columns" :key="column" v-if="hasValue(item, column)">
          {{ column !== 'Avatar' ? itemValue(item, column) : ''}}
          <span v-if="column === 'Avatar'" v-html="itemValue(item, column)"></span>
        </td>
      </slot>
    </tr>
    </tbody>
  </table>
</template>
<script>
  export default {
    name: 'l-table',
    props: {
      columns: Array,
      data: Array
    },
    methods: {
      hasValue (item, column) {
        return item[column.toLowerCase()] !== 'undefined';
      },
      itemValue (item, column) {
        if (column === 'Avatar') {
          console.log(item, item['id']);
          return '<img src="https://starwars-visualguide.com/assets/img/characters/' + item['id'] + '.jpg">';
        }
        return item[column.toLowerCase()]
      }
    }
  }
</script>
<style>
  span img {
    max-height: 40px;
  }
</style>
