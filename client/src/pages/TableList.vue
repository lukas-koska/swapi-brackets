<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <card class="strpied-tabled-with-hover"
                body-classes="table-full-width table-responsive"
          >
            <template slot="header">
              <h4 class="card-title">Star Wars peoples</h4>
              <Transition>
                <span class="badge badge-secondary" v-if="this.loading">Loading</span>
              </Transition>
              <p class="card-category"></p>
            </template>
            <l-table
                class="table-hover table-striped"
                :columns="table1.columns"
                :data="table1.data"
                :filtered-data="table1.filteredData"
                ref="table"
            >
            </l-table>
          </card>

        </div>

      </div>
    </div>
  </div>

</template>
<script>
  import LTable from 'src/components/Table.vue'
  import Card from 'src/components/Cards/Card.vue'
  import axios from 'axios';
  export default {
    components: {
      LTable,
      Card
    },
    data () {

      const peopleColumns = ['Name', 'Height', 'Mass', 'Birth_year', 'Gender', 'Avatar'];
      let peopleData = [];
      return {
        loading: true,
        errored: false,
        table1: {
          columns: [...peopleColumns],
          data: [...peopleData],
          filteredData: [...peopleData],
        }
      }

    },
    mounted () {
      let self = this;
      const api = axios.create({
        baseURL: `http://localhost:8082/api`,
      });
      api
          .get('/people')
          .then(function(response) {
            let data = self.getPeopleData(response.data);
            self.table1.data = data;
            self.table1.filteredData = data;
          })
          .catch(error => {
            console.log(error)
            self.errored = true
          })
          .finally(() => self.loading = false)
    },
    methods: {
      getPeopleData (response) {

        let people = [];
        response.forEach(function(data) {
          let urlArray = data.url.split('/');
          people.push({
            name: data.name,
            height: data.height,
            mass: data.mass,
            birth_year: data.birth_year,
            gender: data.gender,
            url: data.url,
            id: urlArray[urlArray.length - 2],
          })
        });

        return people;
      }
    }
  }
</script>
<style>
  .badge.badge-secondary {
    display: inline-block;
    margin-left: 20px;
    padding: 8px 16px;
    transition: all 500ms ease-in-out;
  }

  .v-enter-active,
  .v-leave-active {
    transition: opacity 0.5s ease;
  }

  .v-enter-from,
  .v-leave-to {
    opacity: 0;
  }
</style>
