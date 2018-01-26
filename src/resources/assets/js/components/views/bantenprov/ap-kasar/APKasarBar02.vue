<template>
  <div style="width: 100%; height: 400px;">
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
          show: true,
          data: []
        },
        yAxis: {},
        series: [{
          type: 'bar',
          data: [
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''}
          ],
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
          globalCoord: true // false by default
        }
      }
    }
  },
  mounted: function () {
    axios.get('/json/bantenprov/ap-kasar/ap-kasar02.json').then(response => {
      let obj_key = [];

      var datas = response.data;

      function removeDuplicates(arr){
        var unique_array = []
        for(var i = 0;i < arr.length; i++){
            if(unique_array.indexOf(arr[i]) == -1){
                unique_array.push(arr[i])
            }
        }
        return unique_array
      }

      Object.values(datas[0])[0].forEach((data, index)=>{

        this.bar.xAxis.data[index] = data.wilayah + ' ' + data.name
        this.bar.series[0].data[index].name   = data.wilayah + ' ' + data.name
        this.bar.series[0].data[index].value  = data.data
        this.bar.title.text = 'Tahun ' + Object.keys(datas[0])[0]
      })

      var i = 1;

      // perulangan
      setInterval(()=>{
        Object.values(datas[0])[i].forEach((data, index) => {

            this.bar.series[0].data[index].name   = data.wilayah + ' ' + data.name
            this.bar.series[0].data[index].value  = data.data
            this.bar.title.text = 'Tahun ' + Object.keys(datas[0])[i]

        });

        i++;

        if(i == Object.keys(datas[0]).length)
        {
          i = 0;
        }
      },4000)

    })
    .catch(function(error) {
      // error
    });
  }
}
</script>
