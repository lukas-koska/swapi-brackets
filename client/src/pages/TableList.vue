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
              <p class="card-category"></p>
            </template>
            <l-table class="table-hover table-striped"
                     :columns="table1.columns"
                     :data="table1.data">
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
            self.table1.data = this.getPeopleData(response.data);
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
</style>
