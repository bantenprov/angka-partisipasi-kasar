<template>
  <div style="width: 100%; height: 200px;">
    <IEcharts :option="bar" :loading="loading"></IEcharts>
  </div>
</template>

<script>
import IEcharts from 'vue-echarts-v3/src/full.js';

export default {
  components: {
    IEcharts
  },
  data () {
    return {
      loading: false,
      bar: {
        title: {
          text: 'ECharts bar + Ajax',
          x: 'center'
        },
        tooltip: {
          show: true
        },
        xAxis: {
          data: ['0','0','0','0','0','0'],
          axisLabel :{
            fontSize: 6
          },
        },
        yAxis: {
          axisLabel :{
            fontSize: 6
          },
        },
        series: [{
          type: 'bar',
          data: [],
          barWidth: 20,
          barGap: '-100%'
        }],
        color: {
          type: 'linear',
          x: 0,
          y: 0,
          x2: 0,
          y2: 1,
          colorStops: [{
              offset: 0, color: '#CDDC39' // color at 0% position
          }, {
              offset: 1, color: '#8BC34A' // color at 100% position
          }],
          globalCoord: false // false by default
        }
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/ap-kasar/ap-kasar-030.json').then(response => {

      var e = response.data;
      var get = e[0].chartdata.grafik[0];

      let i = 0;

      this.bar.xAxis.data = Object.keys(response.data[0].chartdata.grafik[0].tahun[0]);
      this.bar.series[0].data = Object.values(response.data[0].chartdata.grafik[0].tahun[0]);
      this.bar.title.text = response.data[0].chartdata.grafik[0].tingkat + ' ' +response.data[0].chartdata.grafik[0].name;

      setInterval(() => {
        i++;
        setTimeout(() => {

          this.bar.xAxis.data = Object.keys(response.data[0].chartdata.grafik[i].tahun[0]);
          this.bar.series[0].data = Object.values(response.data[0].chartdata.grafik[i].tahun[0]);
          this.bar.title.text = response.data[0].chartdata.grafik[i].tingkat + ' ' + response.data[0].chartdata.grafik[i].name;

        }, 10);

        if(i ==  response.data[0].chartdata.grafik.length) {
          i = 0;
        }
      }, 5000);
      this.loading = false;

    })
    .catch(function(error) {
      // error
    });
  }
}
</script>
