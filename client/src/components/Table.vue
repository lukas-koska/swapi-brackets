<template>
  <table class="table">
    <thead>
      <slot name="columns">
        <tr>
          <th v-for="column in columns" :key="column">
            <span class="table-header">{{column}}</span>
            <input class="form-control" name="name" id="name" v-if="column === 'Name'" v-model="filterName">
          </th>
        </tr>
      </slot>
    </thead>
    <tbody>
    <tr v-for="(item, index) in this.filteredData" :key="index">
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
      data: Array,
      filteredData: Array,
    },
    data () {
      return {
        filterName: ''
      }
    },

    watch: {
      filterName: function(val, oldVal) {
        if (val === oldVal) {
          return;
        }
        this.filterNames(val, oldVal);
      }
    },

    methods: {
      hasValue (item, column) {
        return item[column.toLowerCase()] !== 'undefined';
      },
      itemValue (item, column) {
        if (column === 'Avatar') {
          return '<img alt="' + item['name'] + '" src="https://starwars-visualguide.com/assets/img/characters/' + item['id'] + '.jpg">';
        }
        return item[column.toLowerCase()]
      },
      filterNames (val, oldVal) {
        if (val === undefined || val === null || val.length === 0) {
          this.filteredData = this.data;
          return;
        }
        this.filteredData = [];
        window.console.log(val, oldVal);
        let self = this;

        this.data.forEach(function (value) {
          let name = value['name'].toLowerCase();
          val = val.toLowerCase();
          if (name.includes(val)) {
            self.filteredData.push(value);
          }
        });
      },
    },

  }
</script>
<style>
  span img {
    max-height: 40px;
  }

  span.table-header {
    display: inline-block;
    margin-right: 1rem;
    margin-top: auto;
    margin-bottom: auto;
  }

  th {
    height: 57.5px;
  }

  .form-control {
    width: unset;
    display: inline-block;
  }
</style>
