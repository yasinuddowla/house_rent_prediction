<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.js"></script>
    <title>Tenant Form</title>
</head>

<body>
    <div class="container">

        <h2 class="text-center">Fill the details</h2>

        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Details</legend>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label> Name </label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label> Email </label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label> Phone </label>
                        <input class="form-control" type="text" name="phone">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Flat Details</legend>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label> Title </label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label> Area </label>
                        <select name="area" class="form-control">
                            <option value="" selected disabled>Select Area</option>
                            <option value="100">ADABAR</option>
                            <option value="101">AFTABNAGAR</option>
                            <option value="102">ASHULIA</option>
                            <option value="103">BADDA</option>
                            <option value="104">BANANI</option>
                            <option value="105">BANASREE</option>
                            <option value="106">BARIDHARA</option>
                            <option value="107">BASABO</option>
                            <option value="108">BASHBARI</option>
                            <option value="109">BASHUNDHARA</option>
                            <option value="110">DHAKA</option>
                            <option value="111">DHANMONDI</option>
                            <option value="112">GOPIBAGH</option>
                            <option value="113">GULSHAN</option>
                            <option value="114">HAZARIBAGH</option>
                            <option value="115">KATABON</option>
                            <option value="116">KHILGAON</option>
                            <option value="117">KHILKHET</option>
                            <option value="118">MALIBAGH</option>
                            <option value="119">MANIKNAGAR</option>
                            <option value="120">MIRPUR</option>
                            <option value="121">MOGBAZAR</option>
                            <option value="122">MOHAMMADPUR</option>
                            <option value="123">NAYAPALTAN</option>
                            <option value="124">NIKETAN</option>
                            <option value="125">NIKUNJO</option>
                            <option value="126">RAJABAZAR</option>
                            <option value="127">RAMPURA</option>
                            <option value="128">SHANTINAGAR</option>
                            <option value="129">SHEWRAPARA</option>
                            <option value="130">SHYAMOLI</option>
                            <option value="131">TEJGAON</option>
                            <option value="132">UTTARA</option>
                            <option value="133">WARI</option>
                        </select>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>Features</label>
                        <select name="furn" class="form-control">
                            <option value="" selected disabled>Select Features</option>
                            <option value="Full Furnished">Full Furnished</option>
                            <option value="Semi Furnished">Semi Furnished</option>
                            <option value="Not Furnished">Not Furnished</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="row">
                <div class="col-sm-4 form-group">
                    <label>Size</label>
                    <input class="form-control" type="number" name="size" placeholder=" Square feet">
                </div>
                <div class="col-sm-4 form-group">
                    <label>Baths</label>
                    <select name="basize" class="form-control">
                        <option value="" selected disabled>Select Number of Baths</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Beds</label>
                    <select class="form-control" onchange="getRentPrediction()" name="bsize">
                        <option value="" selected disabled>Select Number of Beds</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label> Description </label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label> Upload Photos (Up to 1) </label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label>Set Rent</label>
                    <input class="form-control" type="number" name="rent" placeholder=" Taka per month">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Predicted Rent</label>
                    <input class="form-control" disabled id="p-rent" placeholder=" Taka per month">
                </div>
            </div>
            <div>
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function getRentPrediction(){
            let beds = $("select[name=bsize]").val()
            let baths = $("select[name=basize]").val()
            let size = $("input[name=size]").val()
            let area = $("select[name=area]").val()
            console.log(beds,baths,size)
            var form = new FormData();
            form.append("size", size);
            form.append("bed", beds);
            form.append("bath", baths);
            form.append("area",area);

            var settings = {
                "url": "http://localhost/House-Renting/prediction/api.py",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                let rent = JSON.parse(response)
                $("#p-rent").val(rent.predicted)
            });
        }
        
    </script>
</body>

</html>