<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" xml:lang="ar" lang="ar">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pepper's Luxury Closet - {{ $PageTitle ?? 'Buy & Sell 100% Authenticated Luxury Items' }}</title>
    <meta name="description"
        content="{{ $PageDescription ?? "Pepper's is Egypt's first and only consignment store for Authentic luxury brands! Egypt's First Consignment Boutique bringing you premium designer brands up to 70% off retail price" }}" />
    <meta name="keywords"
        content="pre-owned, designer, closet, sell, buy, brands, consignment, authentic, store, premium, closet, boutique" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="currency" content="{{ getCurrency()['code'] }}">
    {{-- <meta name="exchange" content="{{ convertCurrency(1, 'USD', 'EGP') }}"> --}}
    <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="shortcut icon" href="{{ url('public/icons/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('public/css') }}/admin.css">
    <link rel="stylesheet" href="{{ url('public/css') }}/demo.css">
    <link rel="stylesheet" href="{{url('public/css')}}/datatable.css">
</head>
