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


function show() {
  $(document).ready(function () {
    $(".xoahct").click(function () {
      var id_hinh = this.value;
      var test = { 'hinh': id_hinh };
      var anh = $(this).closest('figure').attr('id');
      $.post("ajax/xoa_hinhct",test,function(data){
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


  // $(document).ready(function () {
  //   $(".xoa_anhct").click(function () {
  //     var id_hinh = $(this).attr("value");
  //     var formĐata = new FormData();
  //     formĐata.append('hinh', id_hinh);
  //     var ajax = new XMLHttpRequest();
  //     ajax.onreadystatechange = function () {
  //       if (ajax.status == 200 && ajax.readyState == 4) {
  //         var imgPath = ajax.responseText;
  //         $('#test').attr('src', imgPath);
  //       }
  //     }
  //     ajax.open("POST", 'ajax/xoa_hinhct', true);
  //     ajax.send(formĐata);
  //   });
  // });


}
function thongbao() {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Xóa hình thành công',
    showConfirmButton: false,
    timer: 2000
  })

}


