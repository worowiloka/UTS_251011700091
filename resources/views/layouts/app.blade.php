<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - Tunaspace</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Cormorant+Garamond:wght@500;600;700&family=Allura&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
  <style>
    :root {
      --bg:#0f2a1f; --bg2:#154030; --panel:#1a4a37; --cream:#f1ecdd; --cream2:#e4ddcc;
      --text:#ece8da; --muted:#a8c2b2; --ink:#12281d;
      --green:#2f8a5c; --green-light:#8fd6a8; --accent:#8fd6a8; --champagne:#dcc58c; --gold-dark:#8a6a2a;
      --line:rgba(236,232,218,.16); --shadow:0 10px 28px rgba(4,20,12,.45);
    }

    html { background:#0f2a1f; }
    body {
      font-family:'Montserrat',sans-serif;
      color:var(--text);
      min-height:100vh;
      background-color:#0f2a1f;
      background-image:linear-gradient(180deg,#0f2a1f 0%,#154030 50%,#0f2a1f 100%);
      background-attachment:fixed;
    }

    h1,h2,h3,.navbar-brand,.section-title { font-family:'Cormorant Garamond',serif; }
    .script { font-family:'Allura',cursive; font-weight:400; }
    a { color:var(--green-light); }

    /* Navbar */
    .navbar-leaf { background:rgba(15,42,31,.95); backdrop-filter:blur(10px); border-bottom:1px solid var(--line); }
    .navbar-leaf .navbar-brand { font-weight:700; color:var(--cream) !important; letter-spacing:2px; font-size:1.7rem; text-transform:uppercase; }
    .navbar-leaf .nav-link { color:#c3d8ca; font-weight:500; letter-spacing:1px; text-transform:uppercase; font-size:.78rem; }
    .navbar-leaf .nav-link:hover, .navbar-leaf .nav-link.active { color:var(--green-light); font-weight:700; }

    /* Hero */
    .hero {
      min-height:540px; display:flex; align-items:center; position:relative;
      background:
        linear-gradient(90deg, rgba(10,36,25,.92) 0%, rgba(15,42,31,.6) 45%, rgba(15,42,31,.18) 100%),
        linear-gradient(180deg, transparent 70%, var(--bg) 100%),
        url('{{ asset('assets/images/hero.jpg') }}') center/cover no-repeat,
        radial-gradient(circle at 75% 30%, #2f8a5c 0%, #17513a 60%, #0f2a1f 100%);
    }
    .hero h1 { font-weight:700; font-size:clamp(2.7rem,5.5vw,4.6rem); line-height:1.05; color:var(--cream); text-shadow:0 2px 18px rgba(0,0,0,.5); }
    .hero p { max-width:400px; color:#d6e4da; }
    .btn-glass {
      background:var(--cream); color:var(--ink); border:1px solid var(--cream); border-radius:.3rem;
      padding:.8rem 1.9rem; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; font-size:.78rem;
      box-shadow:0 8px 20px rgba(4,20,12,.4); transition:.25s;
    }
    .btn-glass:hover { background:var(--green-light); border-color:var(--green-light); color:var(--ink); transform:translateY(-2px); }

    /* Section */
    .section-title { font-weight:700; font-size:clamp(1.9rem,3.2vw,2.6rem); color:var(--cream); padding-bottom:.4rem; }
    .section-title::after { content:''; display:block; width:52px; height:2px; margin-top:.45rem; background:var(--green-light); }
    .banner .section-title::after, .text-center .section-title::after { margin-inline:auto; }
    .section-sub { color:var(--muted); font-size:.9rem; max-width:420px; }

    /* Pills */
    a.pill { text-decoration:none; display:inline-block; }
    .pill {
      background:transparent; color:var(--text); border:1px solid rgba(236,232,218,.32);
      border-radius:.3rem; padding:.45rem 1.15rem; font-size:.74rem; font-weight:600; letter-spacing:.8px; text-transform:uppercase; transition:.2s;
    }
    .pill:hover { background:rgba(255,255,255,.1); color:var(--text); }
    .pill.active { background:var(--cream); color:var(--ink); border-color:var(--cream); }

    /* Product card */
    .p-card {
      position:relative; background:var(--cream); color:var(--ink); border-radius:.6rem;
      padding:.6rem; height:100%; border:1px solid rgba(255,255,255,.1);
      transition:transform .3s, box-shadow .3s; box-shadow:var(--shadow);
    }
    .p-card:hover { transform:translateY(-8px); box-shadow:0 20px 40px rgba(4,20,12,.6); }
    .thumb {
      position:relative; height:180px; border-radius:.4rem; overflow:hidden;
      background:linear-gradient(135deg,#cfe0cc,#a6c4a8); display:flex; align-items:center; justify-content:center; font-size:3rem;
    }
    .thumb img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform .5s; }
    .p-card:hover .thumb img { transform:scale(1.08); }
    .meta { display:flex; justify-content:space-between; align-items:flex-end; padding:.8rem .4rem .35rem; gap:.5rem; }
    .meta h6 { font-family:'Cormorant Garamond',serif; font-weight:700; margin:0; font-size:1.25rem; color:#17432f; }
    .meta .price { font-size:.88rem; color:var(--gold-dark); font-weight:700; letter-spacing:.3px; }
    .go {
      flex-shrink:0; width:34px; height:34px; border-radius:50%; background:#17432f; color:var(--cream) !important;
      display:flex; align-items:center; justify-content:center; text-decoration:none; transition:.2s;
    }
    .p-card:hover .go { background:var(--green); transform:translateX(3px); }

    /* Banner */
    .banner {
      border-radius:.7rem; padding:3.8rem 2.5rem; color:var(--cream); border:1px solid var(--line);
      background:
        linear-gradient(90deg, rgba(10,36,25,.92), rgba(15,42,31,.3)),
        url('{{ asset('assets/images/banner.jpg') }}') center/cover no-repeat,
        linear-gradient(120deg,#17513a,#2f8a5c);
      box-shadow:var(--shadow);
    }
    .banner .section-title { color:var(--cream); }
    .btn-cream { background:var(--cream); color:var(--ink); font-weight:700; letter-spacing:1.2px; text-transform:uppercase; font-size:.78rem; border-radius:.3rem; padding:.8rem 1.8rem; }
    .btn-cream:hover { background:var(--green-light); color:var(--ink); }

    /* Tips */
    .tip {
      background:var(--panel); border:1px solid var(--line); border-radius:.6rem; padding:1.7rem;
      height:100%; transition:.3s; box-shadow:var(--shadow); border-top:2px solid var(--green-light);
    }
    .tip:hover { transform:translateY(-4px); background:#205640; }
    .tip h6 { font-family:'Cormorant Garamond',serif; color:var(--cream); font-size:1.35rem; letter-spacing:.4px; }
    .tip p { color:var(--muted) !important; }
    .tip .ico {
      font-size:1.6rem; width:54px; height:54px; border-radius:50%; background:rgba(143,214,168,.14); border:1px solid rgba(143,214,168,.4);
      display:flex; align-items:center; justify-content:center;
    }

    /* Detail */
    .detail { background:var(--panel); border:1px solid var(--line); border-radius:.7rem; overflow:hidden; box-shadow:var(--shadow); }
    .detail .thumb { height:100%; min-height:420px; border-radius:0; font-size:7rem; }
    .detail h1 { color:var(--cream); font-weight:700; }
    .detail p { color:#cfe0d4 !important; }
    .detail h6 { color:var(--cream); letter-spacing:.5px; }
    .info-item { background:rgba(255,255,255,.07); border-left:3px solid var(--green-light); border-radius:.4rem; padding:1rem 1.2rem; height:100%; }
    .info-item small { color:var(--muted); text-transform:uppercase; letter-spacing:1px; font-size:.66rem; }
    .info-item div { font-weight:600; color:var(--cream); }
    .price-big { color:var(--champagne); font-family:'Cormorant Garamond',serif; font-weight:700; font-size:2.4rem; }
    .breadcrumb-item+.breadcrumb-item::before { color:#7fa38e; }
    .breadcrumb-item.active { color:var(--muted); }

    /* Pagination */
    .pagination { gap:.35rem; flex-wrap:wrap; justify-content:center; margin:0; }
    .page-link {
      background:transparent; color:var(--text); border:1px solid rgba(236,232,218,.32);
      border-radius:.3rem !important; font-size:.8rem; font-weight:600; min-width:40px; text-align:center;
    }
    .page-link:hover { background:rgba(255,255,255,.12); color:var(--cream); }
    .page-item.active .page-link { background:var(--cream); color:var(--ink); border-color:var(--cream); }
    .page-item.disabled .page-link { background:transparent; color:#6f8a7a; border-color:rgba(236,232,218,.15); }
    nav .small.text-muted, nav .text-muted { color:var(--muted) !important; }

    /* Footer */
    footer { background:#0a2218; color:#9bb8a8; border-top:1px solid var(--line); }
    footer .fw-bold { color:var(--cream) !important; font-family:'Cormorant Garamond',serif; font-size:1.4rem; letter-spacing:2px; text-transform:uppercase; }

    .fade-in { animation:fade .6s ease both; }
    @keyframes fade { from{opacity:0; transform:translateY(14px)} to{opacity:1; transform:none} }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-leaf sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('plants.index') }}">Tunaspace</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link {{ request()->routeIs('plants.index') ? 'active' : '' }}" href="{{ route('plants.index') }}">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('plants.index') }}#koleksi">Koleksi</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('plants.index') }}#tips">Tips</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main>@yield('content')</main>

  <footer class="text-center py-4 mt-5">
    <div class="fw-bold mb-1">🌿 Tunaspace</div>
    <small>© 2026 Katalog Tanaman Hias · Woroaw - 251011700091 · Rekayasa Web</small>
  </footer>

  <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  @stack('scripts')
</body>
</html>