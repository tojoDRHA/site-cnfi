
Highcharts.chart('pieChart1', {
  chart: {
	type: 'column'
  },
  title: {
	text: ''
  },
  subtitle: {
	text: 'Evolution du nombre de caisses / points de services'
  },
  xAxis: {
	categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018',
	  '2019'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
	  pointPadding: 0,
	  borderWidth: 0
	}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [16,20,33,41,50,76,82,87,93,96,96]

  },	  
  {
	name: 'IMF',
	data: [636,680,706,743,770,814,855,882,899,923,938]

  }],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});

//=============================================================

Highcharts.chart('pieChart2', {
  chart: {
	type: 'column'
  },
  title: {
	text: ''
  },
  subtitle: {
	text: 'Evolution du nombre de membres et/ou clients  '
  },
  xAxis: {
	categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018',
	  '2019'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
		  stacking: 'normal'
		}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [591632,680895,750572,838008,865659,946592,1013080,1075550,1144528,1207013,1306789]

  },	  
  {
	name: 'IMF',
	data: [47344,67378,109466,151640,232416,341836,382788,453191,517415,552246,600960]

  }],
  colors: ['#5f308a', '#60ab57',  '#FF0000', '#FFC0CB', '#00FF00'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});

//=============================================================

Highcharts.chart('pieChart3', {
  chart: {
    type: 'line'
  },
  title: {
    text: ''
  },
  subtitle: {
    text: 'Evolution du taux de pénétration des ménages en microfinance'
  },
  xAxis: {
    categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018', 
	  '2019'
	]
  },
  yAxis: {
    title: {
      text: ''
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{
    name: 'Taux de pénétration',
	data: [16.1,17.5,19.5,22.7,24.6,28.1,29.6,31.6,33.4,35.2,36.8]

  }],	  
  colors: ['#cab038', '#60ab57',  '#FF0000', '#FFC0CB', '#00FF00'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});

//=============================================================

Highcharts.chart('pieChart4', {
  chart: {
	type: 'column'
  },
  title: {
	text: ''
  },
  subtitle: {
	text: 'Evolution de l’encours d’épargne du secteur microfinance'
  },
  xAxis: {
	categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018',
	  '2019'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
	  pointPadding: 0,
	  borderWidth: 0
	}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [40536,62173,88437,117763,151594,204752,253326,317688,448352,528538,538661]

  },
  {
	name: 'IMF',
	data: [104638,115695,158488,197027,236088,239392,253620,282069,327850,362238,432279]

  }],
  colors: ['#60ab57', '#5f308a'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});


//=============================================================

Highcharts.chart('pieChart5', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45
    }
  },
  title: {
    text: ''
  },
  subtitle: {
    text: 'Part de marché des différentes catégories d`\'établissements de crédit en termes d\'encours de crédit'
  },
  plotOptions: {
    pie: {
      innerSize: 100,
      depth: 45
    }
  },
  tooltip: {
	format: '<b>{point.name}</b>: {point.percentage:.1f} %',
  },
  series: [{
    name: '',
    data: [
      ['IMF', 44.52],
      ['Autres catégories d\'EC', 55.48]
    ]
  }]
});

//=============================================================

Highcharts.chart('pieChart6', {
  chart: {
	type: 'column'
  },
  title: {
	text: ''
  },
  subtitle: {
	text: 'Répartition des points de service du secteur microfinance par Région'
  },
  xAxis: {
	categories: [
	  '2009',  
	  '2010',
	  '2011',
	  '2012',
	  '2013',
	  '2014',
	  '2015',
	  '2016',
	  '2017',
	  '2018',
	  '2019'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
	  pointPadding: 0,
	  borderWidth: 0
	}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [21304,50461,74873,82027,117766,172203,247563,289933,462486,503510,513491]

  },
  {
	name: 'IMF',
	data: [69700,85983,120619,151503,191667,209979,239899,300357,318991,391033,390676]

  }],
  colors: ['#60ab57', '#5f308a'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});


//=============================================================

Highcharts.chart('pieChart7', {
  chart: {
	type: 'column'
  },
  title: {
	text: 'Evolution du nombre de membres et/ou clients  '
  },
  subtitle: {
	text: ''
  },
  xAxis: {
	categories: [
	  'Alaotra mangoro',  
	  'Amoron\'i mania',
	  'Analamanga',
	  'Analanjirofo',
	  'Androy',
	  'Anosy',
	  'Atsimo-andrefana',
	  'Atsimo-antsinanana',
	  'Antsinanana',
	  'Betsiboka',
	  'Boeny',
	  'Bongolava',
	  'Diana',
      'Haute matsiatra',
	  'Ihorombe',
	  'Itasy',
	  'Melaky',
      'Menabe',
	  'Sava',
	  'Sofia',
	  'Vakinakaratra',
	  'V7v'
	],
	crosshair: true
  },
  yAxis: {
	min: 0,
	title: {
	  text: ''
	}
  },
  tooltip: {
	headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
	footerFormat: '</table>',
	shared: true,
	useHTML: true
  },
  plotOptions: {
	column: {
		  stacking: 'normal'
		}
  },
  series: [
  {
	name: 'Autres catégories d\'EC',
	data: [591632,680895,750572,838008,865659,946592,1013080,1075550,1144528,1207013,1306789,591632,680895,750572,838008,865659,946592,1013080,1075550,1144528,1207013,1207013]

  },	  
  {
	name: 'IMF',
	data: [47344,67378,109466,151640,232416,341836,382788,453191,517415,552246,600960,47344,67378,109466,151640,232416,341836,382788,453191,517415,552246,1207013]

  }],
  colors: ['#5f308a', '#60ab57',  '#FF0000', '#FFC0CB', '#00FF00'],
  responsive: {
    rules: [{
      condition: {
        maxWidth: 600
      },
      chartOptions: {
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        }
      }
    }]
  },
   exporting: {
		showTable: false
  }
});