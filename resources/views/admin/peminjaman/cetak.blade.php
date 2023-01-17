<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Taman Baca - Website Perpustakaan Daerah - Kota Salatiga  </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

    
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
   
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> --}}
</head>

<body id="rapot">
    <div class="container">
        <div class="row">
          <br/>
        </div>

        <div class="row">
            <div class="col-md-9 offset-sm-1">
                <img class="mx-auto d-block" src="{{asset('/images/logo.png')}}" alt="logo" height="70%" width="20%" />
            </div>
            <div class="col-md-1">
              <a id="btncetak" class="btn btn-primary" href="#"> Cetak </a>
            </div>
        </div
        <br/>
        <br/>
{{-- 
        <div class="row">
          <div class="col-md-7 offset-sm-2">
            <h1 class="text-center"> <strong> DATA MASTER BARANG / ALAT </strong> </h1>   
          </div>    
        </div>
        <br/>
        <br/> --}}

        <div class="row">
            <div class="col-md-7 offset-sm-2">
              <h3 class="text-center"> Taman Baca - Website Perpustakaan Daerah - Kota Salatiga </h3>   
            </div>    
        </div>
        <br/>
        <br/>

        {{-- <div class="row">
            <div class="col-md-7 offset-sm-2">
              <h3 class="text-center"> NOMOR SERI BARANG/ALAT </h3>   
            </div>    
        </div>

        <div class="row">
            <div class="col-md-7 offset-sm-2">
              <h4 class="text-center" style="border: 2px solid #000000"> {{ $alat->serial_number }} </h4>   
            </div>    
        </div>
        <br/>
        <br/>
        <br/>

        <div class="row">
            <div class="col-md-7 offset-sm-2">
              <h3 class="text-center"> NAMA BARANG/ALAT </h3>   
            </div>    
        </div>
        <br/>
        

        <div class="row">
            <div class="col-md-7 offset-sm-2">
              <h4 class="text-center" style="border: 2px solid #000000"> {{ $alat->merk }} </h4>   
            </div>    
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/> --}}
        <div class="row">
          <div class="col-md-7 offset-sm-2">
            <h1 class="text-center">
                BUKU YANG AKAN DI PINJAM
            </h1>  
          </div>    
        </div> 
        <br>
        <br>

        <table cLass="table table-striped table-bordered table-hover">
            <thead>
              <tr class="text-center">
                <td> ID PEMINJAM </td>
                <td> ID BUKU </td>
                <td> TGL PINJAM </td>
                <td> TGL KEBALI </td>
              </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td> {{ $peminjaman->anggota_id }} </td>
                    <td> {{ $peminjaman->buku_id }} </td>
                    <td> {{ $peminjaman->tgl_pinjam }} </td>
                    <td> {{ $peminjaman->tgl_kembali }} </td>
                </tr>
            </tbody>
          </table>

        {{-- <div class="row" >
            <div class="col-sm-3 offset-1">
              <h6> Nomor Seri Barang/alat : </h6>
            </div>
            <div class="col-sm-7">
              <h5>  <strong> {{ $alat->serial_number }} </strong>  </h5>
            </div>  
          </div>    

        <div class="row">
          <div class="col-sm-3 offset-1">
            <h6> Merk Barang/Alat : </h6>
          </div>
          <div class="col-sm-7">
            <h5> <strong> {{ $alat->merk }} </strong> </h5>
          </div>  
        </div>

        <div class="row">
          <div class="col-sm-3 offset-1">
            <h6> Jenis Barang/Alat : </h6>
          </div>
          <div class="col-sm-7">
            <h6>  {{ $alat->jenis }}  </h6>
          </div>  
        </div> 

        <div class="row">
          <div class="col-sm-3 offset-1">
            <h6> Jumlah Barang : </h6>
          </div>
          <div class="col-sm-7">
            <h5>  <strong> {{ $alat->jumlah }} </strong>  </h5>
          </div>  
        </div>  --}}

        <script>
          function cetak() {
            print({
              printable: "app",
              type: "html",
              style:
                "#rapot {} h1 {  }",
              css: "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",
              onPrintDialogClose: () => alert("Print job complete.")
            });
          }
          document.getElementById("btncetak").addEventListener("click", cetak);
        </script>

    
</body>

</html>