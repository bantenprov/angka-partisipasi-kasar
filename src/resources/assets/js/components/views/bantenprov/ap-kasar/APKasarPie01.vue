<template>
  <div style="width: 100%; height: 400px;">
    <IEcharts :option="pie"></IEcharts>
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
      pie: {
        backgroundColor: '#fff',
        title: {
          text: 'ECharts pie',
          left: 'center',
          top: 20,
          textStyle: {
            color: '#000'
          }
        },
        tooltip: {
          show: true,
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        visualMap: {
          show: false,
          min: 1000,
          max: 80000,
          inRange: {
            colorLightness: [0, 1]
          }
        },
        series : [
          {
            type:'pie',
            radius : '55%',
            center: ['50%', '50%'],
            data:[
                {},
                {},
                {},
                {},
                {},
                {},
            ].sort(function (a, b) { return a.value - b.value; }),
            roseType: 'radius',
            label: {
              normal: {
                textStyle: {
                  color: '#444'
                }
              }
            },
            labelLine: {
              normal: {
                lineStyle: {
                  color: '#444'
                },
                smooth: 0.2,
                length: 10,
                length2: 20
              }
            },
            itemStyle: {
              normal: {
                color: '#2196f3',
                shadowBlur: 200,
                shadowColor: 'rgba(255, 205, 210, 0.25)'
              }
            },

            animationType: 'scale',
            animationEasing: 'elasticOut',
            animationDelay: function (idx) {
              return Math.random() * 200;
            }
          }
        ]
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/ap-kasar/ap-kasar-010.json').then(response => {
      let i = 0;
      for(var first = 0; first < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; first++){
        this.pie.series[0].data[first].value = Object.values(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.series[0].data[first].name = Object.keys(response.data[0].chartdata.grafik[0].tahun[0])[first]
        this.pie.title.text = response.data[0].chartdata.grafik[0].tingkat + ' ' + response.data[0].chartdata.grafik[0].name
      }

      this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) + 2000
      this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[0].tahun[0])) - 2000

      setInterval(() => {
        i++;
        setTimeout(() => {
          for(var k = 0; k < Object.keys(response.data[0].chartdata.grafik[0].tahun[0]).length; k++){
            this.pie.series[0].data[k].value = Object.values(response.data[0].chartdata.grafik[i].tahun[0])[k]
            this.pie.series[0].data[k].name = Object.keys(response.data[0].chartdata.grafik[i].tahun[0])[k]

            this.pie.title.text = response.data[0].chartdata.grafik[i].tingkat + ' ' + response.data[0].chartdata.grafik[i].name

            this.pie.visualMap.max = Math.max.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) + 6000
            this.pie.visualMap.min = Math.min.apply(null,Object.values(response.data[0].chartdata.grafik[i].tahun[0])) - 6000
          }
        }, 1000);

        if(i ==  response.data[0].chartdata.grafik.length) {
          i = 0;
        }
      }, 5000);

    })
    .catch(function(error) {
      // error
    });
  }
}
</script>
