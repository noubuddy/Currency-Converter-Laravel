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
        <section class="login-clean" style="height: 100%;">
            <form action="/" method="post" style="min-width: 500px;margin-top: 10px;">
                @csrf
                <h2 class="visually-hidden">Login Form</h2>
                <div class="illustration">
                    <h1 style="border-style: solid;">Currency converter</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <p style="margin-bottom: 5px;">Currency</p>
                        <div>
                            <select name="from" style="/*background-color: #f4476b;" class="form-select mb-3" aria-label=".form-select-lg example">
                                <option value="1">EUR</option>
                                <option value="2">USD</option>
                                <option value="3">RUB</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" type="number" name="amount" placeholder="Amount" style="padding-left: 8px; margin-bottom: 10px">
                        <input class="form-control" type="date" name="date" placeholder="Date" style="padding-left: 0px;">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-cyan);">
                            Calculate
                        </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col" style="padding-top: 3%; padding-left: 7%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Currency rate</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($rate_estonia))
                            @for ($i = 0; $i < count($rate_estonia); $i++)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $rate_estonia[$i]['currency'] }}</td>
                                <td>{{ $rate_estonia[$i]['rate'] }}</td>
                                <td>{{ $rate_estonia[$i]['rate'] * $amount }}</td>
                            </tr>
                            @endfor
                            @else 
                                {{ 'No data' }}
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col" style="padding-top: 3%; padding-right: 7%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Currency rate</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($rate_lithuania))
                            @for ($i = 0; $i < count($rate_lithuania); $i++)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $rate_lithuania[$i][1] }}</td>
                                <td>{{ $rate_lithuania[$i][2] }}</td>
                                <td>{{ $rate_lithuania[$i][2] * $amount }}</td>
                            </tr>
                            @endfor
                            @else 
                                {{ 'No data' }}
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            
            {{-- <div style="padding-left: 10%; padding-right: 10%; padding-top: 3%;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Currency rate</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($prop2))
                        @for ($i = 0; $i < count($prop2); $i++)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $prop2[$i][1] }}</td>
                            <td>{{ $prop2[$i][2] }}</td>
                            <td>{{ $prop2[$i][2] * $amount }}</td>
                        </tr>
                        @endfor
                        @else 
                            {{ 'No data' }}
                        @endif
                    </tbody>
                </table>
            </div> --}}

            

        </section>

    </div>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/dropdown.js"></script>
</body>

</html>