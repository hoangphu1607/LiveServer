function showImage(idAnh, duongdan) {
  var fr = new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function (e) { duongdan.src = this.result; };
  idAnh.addEventListener("change", function () {
    // fill fr with image data    
    fr.readAsDataURL(idAnh.files[0]);
    duongdan.style.width = "70%";
    duongdan.style.height = "auto";
    duongdan.style.position = "relative";
    duongdan.style.margin = "auto";
    duongdan.style.display = "flex";
    duongdan.style.gap = "20px";
  });
}


function preview() {
  let fileInput = document.getElementById("file-input");
  let imageContainer = document.getElementById("images");
  imageContainer.innerHTML = "";
  for (i of fileInput.files) {
    let reader = new FileReader();
    let figure = document.createElement("figure");
    let figCap = document.createElement("figcaption");
    figCap.innerText = i.name;
    figure.appendChild(figCap);
    reader.onload = () => {
      let img = document.createElement("img");
      img.setAttribute("src", reader.result);
      figure.insertBefore(img, figCap);
    }
    imageContainer.appendChild(figure);
    reader.readAsDataURL(i);
  }
}
function preview1() {
  let fileInput = document.getElementById("file-input");
  let imageContainer = document.getElementById("themanh_sua");
  imageContainer.innerHTML = "";
  for (i of fileInput.files) {
    let reader = new FileReader();
    let figure = document.createElement("figure");
    let figCap = document.createElement("figcaption");
    figCap.innerText = i.name;
    figure.appendChild(figCap);
    reader.onload = () => {
      let img = document.createElement("img");
      img.setAttribute("src", reader.result);
      figure.insertBefore(img, figCap);
    }
    imageContainer.appendChild(figure);
    reader.readAsDataURL(i);
  }
}


//xoa hinh ct
$(document).ready(function () {
  $(".xoahct").click(function () {
    var id_hinh = this.value;
    var test = { 'hinh': id_hinh };
    var anh = $(this).closest('figure').attr('id');
    $.post("ajax/xoa_hinhct", test, function (data) {
      data = JSON.parse(data);
      if (data == true) {
        thongbao();
        setTimeout(function () {
          $("#" + anh).slideUp();
        }, 2000);
        setTimeout(function () {
          $("#" + anh).remove();
        }, 3000);
        // location.reload();
      }
    });

  });
});


//xoa

$(document).ready(function () {
  $(".xoattsach").click(function () {
    var tr = $(this).closest('tr').attr('id');
    var tr2 = $(this).closest('tr')
    var data = {
      'id_sach_xoa': tr,
    };
    Swal.fire({
      title: 'Bạn có chắc muốn xóa sách này không ?',
      text: "Dữ liệu sách này sẽ mất không thể khôi phục ",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Không đồng ý',
      confirmButtonText: 'Đồng ý xóa'

    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/xoasach",
          method: 'POST',
          data: data,
          success: function (data) {
            data = JSON.parse(data);
            if (data == true) {
              thongbao_xoathanhcong();
              tr2.prop('hidden', true);
            }
            else {
              thongbao_thatbai();
            }
          }
        });
      }
    })


    // console.log(tr);
  });
});

// them loai sach
$(document).ready(function () {
  $('#themloaisach').on('submit', function (event) {
    event.preventDefault();
    var tensach = $("#tenls").val();
    var data = { themloaisach: 'gui', tensach: tensach }
    $.ajax({
      url: "ajax/them_ls",
      method: 'POST',
      data: data,
      success: function (data) {
        data = JSON.parse(data);
        if (data == true) {
          thongbao_thenloaisachtc();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else {
          thongbao_thatbai();
        }
      }
    });

  });
});
// lay id sua loai sach

$(document).ready(function () {
  $(".sualoaisach").click(function () {
    var maloaisach = $(this).val();
    var data = { maloaisach: maloaisach };
    $.ajax({
      url: "ajax/showsachsua",
      method: 'POST',
      data: data,
      success: function (data) {
        data = JSON.parse(data);
        if (data == false) {
          thongbao_loi();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else if (data.check == false) {
          thongbao_loi();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else {
          $('#tenls_cansua').val(data[0].TenLoaiSach);
          $('#xong_suasach').prop('value', data[0].MaLoaiSach);
        }

      }
    });


  });
});

//sua sach can sua

$(document).ready(function () {
  $('#sualoaisach').on('submit', function (event) {
    event.preventDefault();

    var tensach_cs = $('#tenls_cansua').val();
    var maloaisach = $('#xong_suasach').val();
    var data = { tensach: tensach_cs, maloaisach: maloaisach };
    $.ajax({
      url: "ajax/suasach",
      method: 'POST',
      data: data,
      success: function (data) {
        data = JSON.parse(data);
        console.log(data);
        if (data == true) {
          thongbao_sualoaisach_tc();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else {
          thongbao_sualoaisach_tb();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }

      }
    });


  });
});


// xoa loai sach

$(document).ready(function () {
  $(".xoaloaisach").click(function () {
    var mals = $(this).val();
    var data = { maloaisach: mals };
    var tr2 = $(this).closest('tr')
    $.ajax({
      url: "ajax/xoaloaisach",
      method: 'POST',
      data: data,
      success: function (data) {
        data = JSON.parse(data);
        if (data == true) {
          thongbao_xoaloaisach_tc();
          tr2.prop('hidden', true);
        }
        else {
          thongbao_xoaloaisach_tb();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      }
    });

  });
});

//xem file excel
$(document).ready(function () {
  $('#xemfile').on('submit', function (event) {
    var file_ex =  new FormData(this);
    event.preventDefault();
    $.ajax({
      url: "ajax/xemfile",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
        Swal.fire({
          title: 'Đảng tải...',
          html: 'Vui lòng chờ đợi...',
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading()
          }
        });
    },
      success: function (data) {
        data = JSON.parse(data);
        if (data.check == true) {
          var kt_op = $('#sheet').children('option').length;
          if (kt_op >= 2) {
            $('#sheet').find('option').remove();
            $("#sheet").append(new Option("Chọn Sheet", 0, true));
          }
          for (var i = 0; i < data.kq.length; i++) {
            $("#sheet").append(new Option(data.kq[i], data.kq[i]));
          }
          swal.close();
        }
         else {
          swal.close();
          Swal.fire({
            icon: 'warning',
            title: 'Không có file',
            text: data.kq,
          })
        }
      }
    });
  });
});
//load dl vao table
$(document).ready(function () {
$('#sheet').on('change', function () {
  var myForm = document.getElementById('xemfile');
  $.ajax({ 
    url: "ajax/dulieu_trongfile",
    method: 'POST',
    data:new FormData(myForm),
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      Swal.fire({
        title: 'Đảng tải...',
        html: 'Vui lòng chờ đợi...',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
        }
      });
  },
    success: function (data2) {
      data2 = JSON.parse(data2);
      console.log(data2); 
      console.log(data2.length); 
      console.log(data2[0].tensach); 
      for (var i = 0; i < data2.length; i++) {
        var bangsv = `
        <tr>
            <th scope="row">${data2[i].stt}</th>
            <td>${data2[i].tensach}</td>
            <td>${data2[i].ndn_ex}</td>
            <td>${data2[i].sl_ex}</td>
            <td>${data2[i].ngaynhap_ex}</td>
            <td>${data2[i].ha_ex}</td>
            <td>${data2[i].gia_ex}</td>
            <td>${data2[i].loaisach_ex}</td>
            <td>${data2[i].tacgia_ex}</td>
            <td>${data2[i].khoacn_ex}</td>
        </tr>
    `;
    $("#tb1").append(bangsv);
      }
      swal.close();
    }
  });

  
});
});

function thongbao() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Xóa hình thành công',
    showConfirmButton: false,
    timer: 2000
  })

}
function thongbao_xoaloaisach_tc() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Xóa loại sách thành công',
    showConfirmButton: false,
    timer: 2000
  })

}
function thongbao_xoaloaisach_tb() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Xóa loại sách thất bại',
    showConfirmButton: false,
    timer: 2000
  })

}

function thongbao_sualoaisach_tc() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'sửa loại sách thành công',
    showConfirmButton: false,
    timer: 2000
  })

}

function thongbao_sualoaisach_tb() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'sửa loại sách thất bại',
    showConfirmButton: false,
    timer: 2000
  })

}

function thongbao_thatbai() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Xóa thất bại vui lòng kiểm tra lại dữ liệu trước đó',
    showConfirmButton: false,
    timer: 2000
  })

}
function thongbao_xoathanhcong() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Xóa sách thành công',
    showConfirmButton: false,
    timer: 2000
  })

}
function thongbao_thenloaisachtc() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Thêm loại sách thành công',
    showConfirmButton: false,
    timer: 2000
  })

}

function thongbao_loi() {
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Đã có lỗi sãy ra vui lòng kiểm tra lại',
    showConfirmButton: false,
    timer: 2000
  })

  function thongbao_khongchonfile() {
    Swal.fire({
      icon: 'warning',
      title: 'Không có file',
      text: 'Vui lòng chọn file',
      footer: '<a href="">Why do I have this issue?</a>'
    })
  }
  function loading_dl(){
    Swal.fire({
      title: 'Đảng tải...',
      html: 'Vui lòng chờ đợi...',
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading()
      }
    });
    //swal.close();//đống dữ liệu load
  }


}
