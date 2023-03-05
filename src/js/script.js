
// using ajax
// let keyword = document.getElementById('keyword');
// let searchBtn = document.getElementById('search');
// let table = document.getElementById('table');

// keyword.addEventListener('keyup', function() {

//     //buat object ajax
//     let xhr = new XMLHttpRequest();

//     //cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if(xhr.readyState == 4 && xhr.status == 200) {
//             table.innerHTML = xhr.responseText;
//         }
//     }

//     //eksekusi ajax
//     xhr.open('GET', 'ajax/table.php?keyword=' + keyword.value, true);
//     xhr.send();
// })


//using jquery
$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        $('#table').load('ajax/table.php?keyword=' + $('#keyword').val());
    });
});