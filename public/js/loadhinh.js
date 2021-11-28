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
      }
    });

  });
});


//xoasach
$(document).ready(function () {
  $(".xoattsach").click(function () {
    var tr = $(this).closest('tr').attr('id');
    var tr2 = $(this).closest('tr')
    var data = {
      'id_sach_xoa': tr,
      //'xoahinh':
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
    event.preventDefault();
    $.ajax({
      url: "ajax/xemfile",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
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
        data = JSON.parse(data);/* load combobox*/
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
    var kt_op = $('#tb1').find('tr').length;
    if (kt_op >= 1) {
      $('#tb1').find('tr').remove();
    }
    var myForm = document.getElementById('xemfile');
    $.ajax({
      url: "ajax/dulieu_trongfile",
      method: 'POST',
      data: new FormData(myForm),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
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
        try {
          data2 = JSON.parse(data2);     //so sanh luon roi do ra 
          var cd = (new Date()).toISOString().split('T')[0];
          var mang = [];
          var mang2 = [];
          var mang3 = [];
          for (var i = 0; i < data2.noidung.length; i++) {
            mang.push(data2.noidung[i].loaisach_ex);
            mang2.push(data2.noidung[i].tacgia_ex);
            mang3.push(data2.noidung[i].khoacn_ex);
          }

          var array3 = []; //load loại sách
          var check = 0;
          for (var i = 0; i < mang.length; i++) {
            check = 0;
            for (var j = 0; j < data2.loaisach.length; j++) {
              if (mang[i].toUpperCase() === data2.loaisach[j].TenLoaiSach.toUpperCase()) {
                array3[i] = {
                  tenloaisach_new: data2.loaisach[j].TenLoaiSach,
                  maloaisach_new: data2.loaisach[j].MaLoaiSach
                };
                check = 1;
              }
            }
            if (check == 0) {
              array3[i] = {
                tenloaisach_new: "Chọn Loại Sách",
                maloaisach_new: ""
              };
            }
          }

          var tacgia = []; //load tác giả
          var check1 = 0;
          for (var i = 0; i < mang2.length; i++) {
            check1 = 0;
            for (var j = 0; j < data2.tacgia.length; j++) {
              if (mang2[i].toUpperCase() === data2.tacgia[j].TenTG.toUpperCase()) {
                tacgia[i] = {
                  tentacgia_new: data2.tacgia[j].TenTG,
                  matacgia_new: data2.tacgia[j].MaTG
                };
                check1 = 1;
              }
            }
            if (check1 == 0) {
              tacgia[i] = {
                tentacgia_new: "Chọn Tác Gỉa",
                matacgia_new: ""
              };
            }
          }

          var khoacn = []; //load khoa chuyên ngành
          var check2 = 0;
          for (var i = 0; i < mang3.length; i++) {
            check2 = 0;
            for (var j = 0; j < data2.khoacn.length; j++) {
              if (mang3[i].toUpperCase() === data2.khoacn[j].TenCN.toUpperCase()) {
                khoacn[i] = {
                  tenkhoacn_new: data2.khoacn[j].TenCN,
                  makhoacn_new: data2.khoacn[j].MaKhoaCN
                };
                check2 = 1;
              }
            }
            if (check2 == 0) {
              khoacn[i] = {
                tenkhoacn_new: "Chọn Khoa Chuyên Ngành",
                makhoacn_new: ""
              };
            }
          }



          for (var i = 0; i < data2.noidung.length; i++) {
            var bangsv = `
        <tr>
            <th scope="row">${data2.noidung[i].stt}</th>
            <td> <input type="text" class="form-control" id="txt" placeholder="tên sách" name="tensach[]" value="${data2.noidung[i].tensach}" required></td>
            <td> <textarea name="noidungngan[]" id="Noidungngan"  cols="30" rows="10" class="form-control ">${data2.noidung[i].ndn_ex}</textarea></td>
            <td> <input type="number" class="form-control" id="SoLuong" placeholder="Số Lượng" name="SoLuong[]" required min="0" value="${data2.noidung[i].sl_ex}"></td>
            <td><input type="date" id="time" name="time[]" min="2000-01-02" max="${cd}" value="${data2.noidung[i].ngaynhap_ex}" required></td>
            <td><div class="a"> <input type="file" id="idAnh" accept="image/png, image/jpeg" name="anh[]"></div></td>
            <td><input type="file" name="n_anh${data2.noidung[i].stt}[]" multiple="multiple" id="file-input" accept="image/png, image/jpeg"></td>
            <td><input type="number" class="form-control" id="Gia" placeholder="Giá Tiền" name="Gia[]" required min="0" value="${data2.noidung[i].gia_ex}"></td>
             <td>
             <select name="MaLoaiSach[]" class="form-control ex_loaisach" aria-label="Default select example" required>
             <option selected  hidden value="${array3[i].maloaisach_new}">${array3[i].tenloaisach_new}</option>
             </select>
             </td>
            <td>
            <select name="MaTacGia[]"  class="form-control ex_tacgia" aria-label="Default select example" required>
             <option selected  hidden value="${tacgia[i].matacgia_new}">${tacgia[i].tentacgia_new}</option>
             </select>
            </td>
            <td>
            <select name="MaCN[]" class="form-control ex_khoacn" aria-label="Default select example" required>
            <option selected  hidden value="${khoacn[i].makhoacn_new}">${khoacn[i].tenkhoacn_new}</option>
            </select>
            </td>          
        </tr>
    `;

            $("#tb1").append(bangsv);
          }
          //loai sach
          $.ajax({
            url: "ajax/load_ls",
            method: 'POST',
            success: function (data) {
              var data = JSON.parse(data);
              data.forEach(value2 => {
                $(".ex_loaisach").append(new Option(value2.TenLoaiSach, value2.MaLoaiSach));
              });



            }


          });
          //tac gia
          $.ajax({
            url: "ajax/load_tacgia",
            method: 'POST',
            success: function (data_tg) {
              var data_tg = JSON.parse(data_tg);


              data_tg.forEach(value2 => {
                $(".ex_tacgia").append(new Option(value2.TenTG, value2.MaTG));
              });


            }
          });
          //khoa chuyen nganh
          $.ajax({
            url: "ajax/load_khoacn",
            method: 'POST',
            success: function (data_khoacn) {
              var data_khoacn = JSON.parse(data_khoacn);


              data_khoacn.forEach(value2 => {
                $(".ex_khoacn").append(new Option(value2.TenCN, value2.MaKhoaCN));
              });


            }
          });
          swal.close();
        } catch (err) {
          swal.close();
          Swal.fire({
            position: 'center',
            icon: "warning",
            title: "Không tìm thấy sheet của bạn",
            showConfirmButton: false,
            timer: 3000
          })

        }
      }

    });



  });
});

//thêm dl vào ex
$(document).ready(function () {
  $('#fomr_ex').on('submit', function (event) {
    event.preventDefault();
    var Form_ex = document.getElementById('fomr_ex');
    $.ajax({
      url: "ajax/luu_ex",
      method: 'POST',
      data: new FormData(Form_ex),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        Swal.fire({
          title: 'Đảng xử lý...',
          html: 'Vui lòng chờ đợi...',
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading()
          }
        });
      },
      success: function (data2) {
        var data_ex = JSON.parse(data2);
        swal.close();
        Swal.fire({
          title: data_ex,
          width: 600,
          padding: '3em',
          background: '#fff url(public/img/anh_thongbao.jpg)',
          backdrop: `
            rgba(0,0,123,0.4)
            url("public/img/nyan-cat.gif")
            left top
            no-repeat
          `
        })


      }
    });
  });
});

//thêm tác giả
$(document).ready(function () {
  $('#form_themtacgia').on('submit', function (event) {
    event.preventDefault();
    var tentacgia = $("#tentacgia").val();
    var sm_tg = $("#btn_themtg").val();
    var data = {
      tentacgia: tentacgia,
      btn_themtg: sm_tg
    };
    $.ajax({
      url: "admin/addTacGia",
      method: 'POST',
      data: data,
      beforeSend: function () {
        Swal.fire({
          title: 'Đảng xử lý...',
          html: 'Vui lòng chờ đợi...',
          allowEscapeKey: false,
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading()
          }
        });
      },
      success: function (data2) {
        var data2 = JSON.parse(data2);
        console.log(data2);
        if (data2 == true) {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Thêm tác giả thành công',
            showConfirmButton: false,
            timer: 2000
          })
          $("#thoatthemtacgia").on("click", function () {
            location.reload();
          });
          $("#btn_thoatthemtg").on("click", function () {
            location.reload();
          });
         
        } else {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Thêm tác giả thất bại',
            showConfirmButton: false,
            timer: 2000
          })
          location.reload();
        }
      }
    });

  });
});

//lấy id tác giả cần sửa
$(document).ready(function () {
  $(".suatacgia").click(function () {
    var matacgia = $(this).val();
    var data = { matacgia: matacgia };
    $.ajax({
      url: "ajax/layid_tacgiacansua",
      method: 'POST',
      data: data,
      beforeSend: function () {
        Swal.fire({
          title: 'Đảng xử lý...',
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
        if (data == false) {
          Swal.close();
          thongbao_loi();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else if (data.check == false) {
          Swal.close();
          thongbao_loi();
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
        else {
          Swal.close();
          $('#tentg_cansua').val(data[0].TenTG);
          $('#btn_suatg').prop('value', data[0].MaTG);
        }
      }
    });


  });
});

//sửa tác giả
$(document).ready(function () {
  $('#form_suatacgia').on('submit', function (event) {
    event.preventDefault();
    var tentg_cs = $('#tentg_cansua').val();
    var matg = $('#btn_suatg').val();
    var data = { tentacgia: tentg_cs, matacgia: matg };
    $.ajax({
      url: "ajax/suatacgia",
      method: 'POST',
      data: data,
      beforeSend: function () {
        Swal.fire({
          title: 'Đảng xử lý...',
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
        if (data == true) {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sửa tác giả thành công',
            showConfirmButton: false,
            timer: 2000
          })
          $("#thoat_suatacgia").on("click", function () {
            location.reload();
          });
          $("#cancel_tg").on("click", function () {
            location.reload();
          });
         
        }
        else {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Sửa tác giả thất bại',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function () {
            location.reload();
          }, 2000);

        }

      }
    });


  });
});

//xóa tác giả
$(document).ready(function () {
  $(".xoatacgia").click(function () {
    var matg = $(this).val();
    var data = { matacgia: matg };
    var tr2 = $(this).closest('tr');
    $.ajax({
      url: "ajax/xoatacgia",
      method: 'POST',
      data: data,
      beforeSend: function () {
        Swal.fire({
          title: 'Đảng xử lý...',
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
        if (data == true) {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Xóa tác giả thành công',
            showConfirmButton: false,
            timer: 2000
          })
          tr2.prop('hidden', true);
       
        }
        else {
          Swal.close();
          Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Xóa tác giả thất bại vui lòng kiểm tra dữ liệu trước đó',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function () {
            location.reload();
          }, 2000);
        }
      }
    });

  });
});


function test() {
  $(document).ready(function () {
    console.log("hello timeout");
    var kt_op = $('#tb1').find('tr').length;
    if (kt_op >= 1) {
      console.log(kt_op)
      $('#luu_ex').prop('hidden', false);
    } else {
      console.log(kt_op)
      $('#luu_ex').prop("hidden", true);
    }
  });
}

/* thong bao */
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



  /* load liên tục website */
  // $(document).ready(function () { 
  // setInterval(function(){ test();},1000);
  // });

  /* load real_time*/
  $(document).ready(function () {
    $("#loadrt").click(function () {
      //   $("#load1").load('ajax/load_realtime'); /* load cách 1 */
      $.ajax({/* load cách 2*/
        url: "ajax/load_realtime",
        method: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data2) {
          $("#load1").html(data2);
        }
      });
    });
  });


}
