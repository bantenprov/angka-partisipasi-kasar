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
        backgroundColor: '#343a40',
        title: {
          text: 'ECharts pie',
          left: 'center',
          top: 20,
          textStyle: {
            color: '#fff'
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
          max: 300000,
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
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''},
                {value:0, name:''}
            ].sort(function (a, b) { return a.value - b.value; }),
            roseType: 'rose',
            label: {
              normal: {
                textStyle: {
                  color: '#fff'
                }
              }
            },
            labelLine: {
              normal: {
                lineStyle: {
                  color: '#eee'
                },
                smooth: 0.2,
                length: 20,
                length2: 40
              }
            },
            itemStyle: {
              normal: {
                color: '#e53935',
                shadowBlur: 200,
                shadowColor: 'rgba(255, 205, 210, 0.25)'
              }
            },

            animationType: 'scale',
            animationEasing: 'cubicOut',
            animationDelay: function (idx) {
              return Math.random() * 200;
            }
          }
        ]
      }
    }
  },
  mounted: function () {

    axios.get('/json/bantenprov/ap-kasar/ap-kasar-02.json').then(response => {
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

      // set nilai awal

      Object.values(datas[0])[0].forEach((data, index)=>{
        this.pie.series[0].data[index].name   = data.wilayah + ' ' + data.name + ' - ' + data.data.toLocaleString('EN')
        this.pie.series[0].data[index].value  = data.data
        this.pie.title.text = 'Tahun ' + Object.keys(datas[0])[0]
      })

      var i = 1;

      setInterval(()=>{
        Object.values(datas[0])[i].forEach((data, index) => {
            this.pie.series[0].data[index].name   = data.wilayah + ' ' + data.name + ' - ' + data.data.toLocaleString('EN')
            this.pie.series[0].data[index].value  = data.data
            this.pie.title.text = 'Tahun ' + Object.keys(datas[0])[i]

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
