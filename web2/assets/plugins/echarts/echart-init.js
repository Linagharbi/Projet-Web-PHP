// ============================================================== 
// Bar chart option
// ============================================================== 
function Vischart (nb, nb1, nb2,nb3)
{
var myChart = echarts.init(document.getElementById('bar-chart'));

// specify chart configuration item and data
option = {
	
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['Nouveau','En cours','Terminé' ,'Validé']
    },
    toolbox: {
        show : true,
        feature : {
            
            magicType : {show: false, type: ['bar']},
			 dataView : {show: true, readOnly: true},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    color: ["#009efb","#55ce63","#FFD700","#dd1d36"],
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : [ 'status']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'Nouveau',
            type:'bar',
            data:[nb],
           
        },
		
          {
            name:'En cours',
            type:'bar',
            data:[nb1],
           
           
        },
		 {
            name:'Terminé',
            type:'bar',
            data:[nb2],
           
           
        },
		 
		 {
            name:'Validé',
            type:'bar',
            data:[nb3],
           
           
        }
    ]
};
                    

// use configuration item and data specified to show chart
myChart.setOption(option, true), $(function() {
            function resize() {
                setTimeout(function() {
                    myChart.resize()
                }, 100)
            }
            $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
        });
}
// ============================================================== 

// doughnut chart option
// ============================================================== 
function Visdoughnut(nb, nb1, nb2, nb3)
{
var doughnutChart = echarts.init(document.getElementById('doughnut-chart'));

// specify chart configuration item and data

option = {
    tooltip : {
        trigger: 'status',
        formatter: "{a} : {b} ({c}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:['A faire','en Cours','Terminée','Validée']
    },
    toolbox: {
        show : true,
        feature : {
            dataView : {show: true, readOnly: true},
           
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    color: ["#009efb","#55ce63","#FFD700","#dd1d36"],
    calculable : true,
    series : [
        {
            name:'Source',
            type:'pie',
            radius : ['80%', '90%'],
            itemStyle : {
                normal : {
                    label : {
                        show : false
                    },
                    labelLine : {
                        show : false
                    }
                },
                emphasis : {
                    label : {
                        show : true,
                        position : 'center',
                        textStyle : {
                            fontSize : '30',
                            fontWeight : 'bold'
                        }
                    }
                }
            },
            data:[
                {value:nb, name:'Tâche â faire'},
                {value:nb1, name:'Tâche en cours'},
                {value:nb2, name:'Tâche terminée'},
                {value:nb3, name:'Tâche validée'},
                
            ]
        }
    ]
};
                                    
                    

// use configuration item and data specified to show chart
doughnutChart.setOption(option, true), $(function() {
            function resize() {
                setTimeout(function() {
                    doughnutChart.resize()
                }, 100)
            }
            $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
        });
}
// ============================================================== 
// doughnut chart option
// ============================================================== 
function Visdoughnutchef(nb, nb1, nb2,nb3)
{
var doughnutChart = echarts.init(document.getElementById('doughnut-chartchef'));

// specify chart configuration item and data

option = {
    tooltip : {
        trigger: 'status',
        formatter: "{a} : {b} ({c}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:['Nouveau','en Cours','Terminé','Validé']
    },
    toolbox: {
        show : true,
        feature : {
            dataView : {show: true, readOnly: true},
         
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    color: ["#009efb","#55ce63","#FFD700","#dd1d36"],
    calculable : true,
    series : [
        {
            name:'Source',
            type:'pie',
            radius : ['80%', '90%'],
            itemStyle : {
                normal : {
                    label : {
                        show : false
                    },
                    labelLine : {
                        show : false
                    }
                },
                emphasis : {
                    label : {
                        show : true,
                        position : 'center',
                        textStyle : {
                            fontSize : '30',
                            fontWeight : 'bold'
                        }
                    }
                }
            },
            data:[
                {value:nb, name:'Nouveau Projet'},
                {value:nb1, name:'Projet En cours'},
				{value:nb2, name:'Projet Terminé'},
                {value:nb3, name:'Projet validé'},
                
            ]
        }
    ]
};
                                    
                    

// use configuration item and data specified to show chart
doughnutChart.setOption(option, true), $(function() {
            function resize() {
                setTimeout(function() {
                    doughnutChart.resize()
                }, 100)
            }
            $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
        });
}
// ============================================================== 
