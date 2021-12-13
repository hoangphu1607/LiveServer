$(document).ready(function (){
  $.ajax({
    url: "ajax/laysoluongsach",
      method: 'POST', 
      success:function(data) {
        var dulieu = JSON.parse(data);
        
        new Morris.Bar({
          // ID of the element in which to draw the chart.
          element: 'myfirstchart',
          // Chart data records -- each entry in this array corresponds to a point on
          // the chart.
          data: [
            { year: 'CNTT', value: dulieu[0] },
            { year: 'CNTP', value: dulieu[1]  },
            { year: 'Ô Tô', value: dulieu[2]  },
            { year: 'Thú Y', value: dulieu[3]  },
            { year: 'Du Lịch', value: dulieu[4]  },
            { year: 'Luật', value: dulieu[5]  },
            { year: 'Cơ Khí', value: dulieu[6]  },
            { year: 'CNSH', value: dulieu[7]  }
          ],
          // The name of the data record attribute that contains x-values.
          xkey: 'year',
          // A list of names of data record attributes that contain y-values.
          ykeys: ['value'],
          // Labels for the ykeys -- will be displayed when you hover over the
          // chart.
          labels: ['Value']
        });
      }     
  });
  
});
