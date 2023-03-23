<template>
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-8">
          <chart-card :chart-data="lineChart.data"
                      :chart-options="lineChart.options"
                      :responsive-options="lineChart.responsiveOptions"
                      ref="chart"
          >
            <template slot="header">
              <h4 class="card-title">Character height and mass</h4>
            </template>
            <template slot="footer">
              <div class="legend">
                <i class="fa fa-circle text-info"></i> Mass
                <i class="fa fa-circle text-danger"></i> Height
              </div>
              <hr>
            </template>
          </chart-card>
        </div>
      </div>

    </div>
  </div>
</template>
<script>
  import ChartCard from 'src/components/Cards/ChartCard.vue'
  import StatsCard from 'src/components/Cards/StatsCard.vue'
  import LTable from 'src/components/Table.vue'
  import axios from "axios";

  export default {
    components: {
      LTable,
      ChartCard,
      StatsCard
    },
    data () {
      return {
        editTooltip: 'Edit Task',
        deleteTooltip: 'Remove',
        lineChart: {
          data: {
            labels: [],
            series: [
              [],
              [],
            ]
          },
          options: {
            low: 0,
            high: 250,
            showArea: false,
            height: '245px',
            axisX: {
              showGrid: false
            },
            lineSmooth: true,
            showLine: true,
            showPoint: true,
            fullWidth: true,
            chartPadding: {
              right: 50
            },
            loading: true,
          },
          responsiveOptions: [
            ['screen and (max-width: 640px)', {
              axisX: {
                labelInterpolationFnc (value) {
                  return value[0]
                }
              }
            }]
          ]
        }
      }
    },
    methods: {

      getPeopleNames (response) {
        let names = [];
        response.forEach(function(data) {
          names.push(data.name);
        });
        return names;
      },

      getPeopleData (response) {
        let mass = [];
        let height = [];
        response.forEach(function(data) {
          mass.push(data.mass);
          height.push(data.height);
        });
        return [mass, height];
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
            self.lineChart.data.labels = self.getPeopleNames(response.data);
            self.lineChart.data.series = self.getPeopleData(response.data);
            self.lineChart.options.loading = false;
            self.$refs.chart.initChart();
          })
          .catch(error => {
            console.log(error)
          });
    }
  }
</script>
<style>

</style>
