const swiper1 = new Swiper(".slider-1", {
	autoplay: {
		delay: 3500,
		disableOnInteraction: false,
	},
	grabCursor: true,
	effect: "fade",
	loop: true,
	navigation: {
		nextEl: ".swiper-next",
		prevEl: ".swiper-prev",
	},
});

const swiper2 = new Swiper(".slider-2", {
	grabCursor: true,
	spaceBetween: 30,
	navigation: {
		nextEl: ".custom-next",
		prevEl: ".custom-prev",
	},
	breakpoints: {
		640: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		1024: {
			slidesPerView: 4,
		},
	},
});

const swiper3 = new Swiper(".slider-3", {
	loop: true,
	grabCursor: true,
	autoplay: {
		delay: 3500,
		disableOnInteraction: false,
	},
	spaceBetween: 30,
	slidesPerView: 2,
	breakpoints: {
		768: {
			slidesPerView: 3,
		},
		1024: {
			slidesPerView: 5,
		},
	},
});

function enformat(element) {
	let nodestr = "";
	for (var j = element.length; j > 3; j -= 3) {
		nodestr = "," + element[j - 3] + element[j - 2] + element[j - 1] + nodestr;
	}
	if (element.length % 3 == 0) {
		nodestr = element[0] + element[1] + element[2] + nodestr;
	} else if (element.length % 3 == 2) {
		nodestr = element[0] + element[1] + nodestr;
	} else nodestr = element[0] + nodestr;
	return nodestr;
}

function deformat(element) {
	var list = element.split(",");
	var string = ""
	for (var i = 0; i < list.length; i++) string += list[i];
	return string;
}

var encode_item_price = document.getElementsByClassName("feature-item-price");
for (var i = 0; i < encode_item_price.length; i++) {
	encode_item_price[i].innerText = enformat(String(Number(encode_item_price[i].innerText.split("đ")[0]))) + "đ";
}