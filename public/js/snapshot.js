$(function(){


    var balance = [];
    var categories = [];
    for(var i=0;i<monthly_balance.length;i++){
        categories.push(i);
        balance.push(parseFloat(monthly_balance[i].toFixed(2)));
    }

    console.log(monthly_balance);
    console.log(balance);

    $('#monthly_graph').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'PayDown Over Time'
        },
        xAxis: {
            categories: categories,
            title: {
                text: 'Months'
            }
        },
        yAxis: {
            title: {
                text: 'Total Debt'
            }
        },
        series: [{
            name: 'Balance',
            data: balance
        }]
    });

    console.log(type_totals);
    var keys = Object.keys(type_totals);

    var vals = [];
    for(var i=0; i< keys.length; i++){
        vals[i]= type_totals[keys[i]];
    }


    $('#types_graph').highcharts({
        chart: {
            type: 'column',
            ignoreHiddenSeries : false
        },
        title: {
            text: 'Totals by Type'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: 'Balance'
            }
        },
        series: [{
        	name: 'Account Balance',
            data: vals
        }]
    });

});