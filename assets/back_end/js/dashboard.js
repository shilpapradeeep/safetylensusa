$(document).ready(function(){
  fill_year('year');
  fill_month('month');
  plot_order_graph($('#current_year').val(),$('#current_month').val());
  $('#year').change(function(){
        $('.month').show();
        
        if( $('#year').val()!= '' && $('#month').val()!= ''){
          
          plot_order_graph($('#year').val(),$('#month').val());
        }
    });
  $('#month').change(function(){
      if( $('#year').val()!= '' && $('#month').val()!= ''){
          
          plot_order_graph($('#year').val(),$('#month').val());
        }
    }); 


  
   
});



function plot_order_graph(year=null,month=null)
{

      $('#order').html('<div class="col-md-12" align="center"><i class="fa fa-2x fa-spin fa-spinner"></i></div>');
      var form_data = new FormData();
      var base = $('#baseurl').val();
      var csrfName = $('#csrf_token').val();
      var csrfHash = $('#csrf_hash').val();
      form_data.append(csrfName,csrfHash);
      form_data.append('type','order_status');
      form_data.append('year',year);
      form_data.append('month',month);
       $.ajax({
        url : base+'ploat-order-graph',
        type : 'post',
        dataType : 'json',
        data : form_data,
        cache: false,
        contentType: false,
        processData: false,

      }).done(function (data){

        console.log(data);
       if(data.res==1)//==1
        {
          Highcharts.chart('order', {
              chart: {
                type: 'column'
              },
              title: {
                text: 'Monthly Average Orders'
              },
              credits: {
                enabled: false
              },
              xAxis: {
                categories: data.categories,
                crosshair: true
              },
              yAxis: {
                min: 0,
                title: {
                  text: 'Orders (nos)'
                }
              },
              tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
              },
              plotOptions: {
                column: {
                  pointPadding: 0.2,
                  borderWidth: 0
                }
              },
              series: data.graph
            })
          /*Highcharts.chart('blood_group_chart', {
          chart: {

            type: 'column'

          },

          title: {

            text: 'Blood Group Count of Mahal Members'

          },

          subtitle: {

            text: ''

          },

          xAxis: {

            categories: data.categories,

            
            title: {

              text: 'Blood Groups'

            },

          },

          yAxis: {

            min: 0,

            title: {

              text: 'Count'

            }

          },

          tooltip: {

            headerFormat: '<span style="font-size:10px">Blood Group Count</span>',

            

          },

          plotOptions: {

            column: {

              pointPadding: 0.2,

              borderWidth: 2

            }

          },

          series: data.graph

        });*/

}

          else

          {

            show_error('card_body_blood_group_chart','Education Status');

               

          }

          





      }).fail(function (){



       show_error('card_body_mahal_edu_chart','Education Status');

      });




}

function show_error(id,item)

{

   var str = '<div class="row" style="margin-top:20px"><div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">'+

   ' <div class="alert alert-danger">'+

   ''+

   ' <strong>Sorry!</strong> <hr class="message-inner-separator">'+

   ' <p>No Data</p></div> </div></div>';

   $('#'+id).html(str);

}
// July
