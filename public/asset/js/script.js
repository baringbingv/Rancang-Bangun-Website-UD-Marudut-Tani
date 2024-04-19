const dataproduct = [
    {
      id: "1",
      gambar: "ikan-apung.jpeg",
      nama: "All Feed",
      deskripsi: "Mantap Kali",
      kategori: "Pakan",
    },
    {
      id: "2",
      gambar: "SP-18.jpeg",
      nama: "SP-18",
      deskripsi: "Mantap Kali",
      kategori: "Pupuk"
    },
  ];


  function Getproduct(product) {
    return `
            <div class="col-md-6 col-lg-4 col-xl-3 ${product.id}">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <img src="{{ URL::asset('${product.gambar}') }}" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">${product.kategori}</div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                            <h4>${product.nama}</h4>
                            <p>${product.deskripsi}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                    </div>
                </div>
            </div>
        `;
  }

  const productsContainer = document.querySelector(".products");
    if (productsContainer) {
      dataproduct.forEach(product => {
        productsContainer.innerHTML += Getproduct(product);
      });
    };

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;

      console.log("Nilai elementTop:", elementTop);
      console.log("Nilai windowHeight:", windowHeight);

      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  }

window.addEventListener("scroll", reveal);
