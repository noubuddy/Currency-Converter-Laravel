<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CurrencyCalcMain</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css">
</head>

<body>
    <div class="container-fluid" style="height: 1080px;">
        <section class="login-clean" style="padding-bottom: 80px;height: 100%;">
            <form action="/action" method="post" style="min-width: 500px;margin-top: 100px;">
                @csrf
                <h2 class="visually-hidden">Login Form</h2>
                <div class="illustration">
                    <h1 style="border-style: solid;">Currency converter</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <p style="margin-bottom: 5px;">Convert from</p>
                        <div>
                            <select name="from" style="/*background-color: #f4476b;" class="form-select mb-3" aria-label=".form-select-lg example">
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">RUB</option>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <p style="margin-bottom: 5px;">Convert to</p>
                        <div>
                            <select name="to" style="/*background-color: #f4476b;" class="form-select mb-3" aria-label=".form-select-lg example">
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">RUB</option>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <input class="form-control" type="number" name="amout" placeholder="Amount" style="padding-left: 8px; margin-bottom: 10px">
                        <input class="form-control" type="date" name="date" style="padding-left: 0px;">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-cyan);">
                            Calculate
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/dropdown.js"></script>
</body>

</html>