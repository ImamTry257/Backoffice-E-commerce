var menuContent = document.querySelector('.menu-content');
var dataAkun = document.querySelector('.dataAkun');
var dataMaster = document.querySelector('.dataMaster');
var sidebar = document.querySelector('.sidebar');


menuContent.addEventListener('click',function(e){
	console.log(e.target);
	if(e.target.className == 'dataMaster'){
		e.target.nextElementSibling.classList.toggle('drop');	
	} else if(e.target.className == 'dataAkun'){
		e.target.nextElementSibling.classList.toggle('akun');	
	}
		
})

var jam = document.querySelector('.tanggal_pukul');
// console.log(jam);

var date = new Date().getDate();
var day = new Date().getDay();
var bulan = new Date().getMonth()+1;
var tahun = new Date().getFullYear();

if(day == 1){
	day = 'Senin';
}else if(day == 2){
	day = 'Selasa';
}else if(day == 3){
	day = 'Rabu';
}else if(day == 4){
	day = 'Kamis';
}else if(day == 5){
	day = 'Jumat';
}else if(day == 6){
	day = 'Sabtu';
}else if(day == 0){
	day = 'Minggu';
}

if(bulan == 1){
	bulan = "Januari";
}else if(bulan == 2){
	bulan = 'Februari';
}else if(bulan == 3){
	bulan = 'Maret';
}else if(bulan == 4){
	bulan = 'April';
}else if(bulan == 5){
	bulan = 'Mei';
}else if(bulan == 6){
	bulan = 'Juni';
}else if(bulan == 7){
	bulan = 'Juli';
}else if(bulan == 8){
	bulan = 'Agustus';
}else if(bulan == 9){
	bulan = 'September';
}else if(bulan == 10){
	bulan = 'Oktober';
}else if(bulan == 11){
	bulan = 'November';
}else if(bulan == 12){
	bulan = 'Desember';
}


setInterval(function(){
	var tanggal = day + ', ' + date + ' ' + bulan + ' ' + tahun;
	var JAM = new Date().getHours() +':'+ new Date().getMinutes() + ':' + new Date().getSeconds();
	jam.innerHTML = tanggal + ', ' + 'Pukul : ' + JAM + ' WIB';
}, 1000);


