function sidebar_open() {
  document.getElementById("mySidebar").style.visibility = "visible";
  document.getElementById("mySidebar").style.marginLeft = "0";
  document.getElementById("blur-sidebar").style.visibility = "visible";
}

function sidebar_close() {
  document.getElementById("mySidebar").style.visibility = "hidden";
  document.getElementById("mySidebar").style.marginLeft = "-100%";
  document.getElementById("blur-sidebar").style.visibility = "hidden";
}

number = document.querySelectorAll(".number-order");
numberofitem = document.querySelectorAll(".numberofitem");

function decrease_number(index) {
  number_inner = parseInt(number[index].innerHTML);
  if (number_inner > 0) {
    number_inner--;
    number[index].innerHTML = number_inner;
    numberofitem[index].value = number_inner;
    total_count();
  } else {
    alert("Không thể giảm nữa");
  }
}

function increase_number(index, quantity) {
  number_inner = parseInt(number[index].innerHTML);
  if (number_inner < quantity) {
    number_inner++;
    number[index].innerHTML = number_inner;
    numberofitem[index].value = number_inner;
    total_count();
  } else {
    alert("Không thể tăng nữa");
  }
}

function total_count() {
  let totalPrice = 0;

  document.querySelectorAll(".price-food").forEach((priceDiv, index) => {
    let priceText = priceDiv.textContent;
    let price = parseFloat(priceText.replace(/ đ\/món$/, ""));
    totalPrice += price * parseFloat(number[index].innerHTML);
  });

  var sumPrice = document.getElementById("sum-price");
  var sumprice = document.getElementById("sum-price-hidden");
  sumPrice.innerHTML = totalPrice + '<u style="padding-left: 3px">đ</u>';
  sumprice.value = totalPrice;
}

total_count();

var formCart = document.getElementById("cart-form");
var isReported = document.getElementById("isReported");
formCart.addEventListener("submit", function (event) {
  event.preventDefault();
  if (isReported.value == 1) {
    alert("Bạn đã bị chặn");
    return;
  }
  check = confirm("Bạn muốn thanh toán giỏ hàng này");
  if (check == true) {
    var formData = new FormData(this);
    fetch("../controller/user/product-in-cart.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        console.log(data);
        alert(data);
        window.location.reload();
        console.log(data);
      })
      .catch((error) => {
        console.log(error);
        alert("Error submitting form. Please try again later.");
      });
  } else {
    window.location.reload();
  }
});

function signOut() {
  fetch("../controller/default/signout.php", {
    method: "POST",
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      window.location = "/BTL/user/homepage";
    })
    .catch((error) => {
      console.log(error);
      alert("Error submitting form. Please try again later.");
    });
}

function reDirectLogin() {
  window.location = "/BTL/views/default/login1.php";
}

function reDirectSignUp() {
  window.location = "/BTL/views/default/register.php";
}
