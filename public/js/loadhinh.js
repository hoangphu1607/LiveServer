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




  $(document).ready(function () {
    $(".xoahct").click(function () {
      var id_hinh = this.value;
      var test = { 'hinh': id_hinh };
      var anh = $(this).closest('figure').attr('id');
      $.post("ajax/xoa_hinhct",test, function(data){
       data = JSON.parse(data);
        if(data == true){ 
            thongbao();
           setTimeout(function() {
            $("#"+anh).slideUp();
           },2000);
           setTimeout(function() {
            $("#"+anh).remove();
           },3000);
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
      cancelButtonText:'Không đồng ý',
      confirmButtonText: 'Đồng ý xóa'

    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/xoasach",
          method: 'POST',
          data: data,
          success: function(data) {
             data = JSON.parse(data);
              if(data == true){
                thongbao_xoathanhcong();
                 tr2.prop('hidden', true);;
              }
              else{
                thongbao_thatbai();
              }
          }
      });
      }
    })

    
    // console.log(tr);
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

