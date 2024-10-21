<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Covid-19 Testing Management System">
  <meta name="author" content="Deepak Dukare">

  <title>Covid-19 Testing Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FontAwesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  
  <!-- Custom styles -->
  <link href="css/scrolling-nav.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#page-top">Covid19-TMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#symptoms">Symptoms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#prevention">Prevention</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#vaccination">Vaccination</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testing-centers">Testing Centers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#common-myths">Common Myths</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#resources">Resources</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="new-user-testing.php">Testing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="live-test-updates.php">Live Updates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header Section -->
  <header class="text-black text-center py-5" style="background-color: yellow;">
    <div class="container">
      <h1>Covid-19 Testing Management System</h1>
      <p class="lead">Manage and track Covid-19 testing efficiently</p>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/covid-about.jpg.webp" alt="About Covid-19" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
          <h2>About Covid-19</h2>
          <p>Covid-19 is an infectious disease caused by the coronavirus. While most people experience mild to moderate symptoms, it can cause severe complications in individuals with pre-existing conditions.</p>
          <p>It's important to take preventive measures, including wearing masks, washing hands, and social distancing to limit the spread.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Symptoms Section -->
  <section id="symptoms" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Symptoms of Covid-19</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
              <i class="fas fa-thermometer-three-quarters fa-3x mb-3"></i>
              <h5 class="card-title">High Fever</h5>
              <p class="card-text">Symptoms usually appear 2-14 days after exposure to the virus.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
              <i class="fas fa-head-side-cough fa-3x mb-3"></i>
              <h5 class="card-title">Dry Cough</h5>
              <p class="card-text">Coughing without mucus is one of the primary symptoms of Covid-19.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
              <i class="fas fa-lungs fa-3x mb-3"></i>
              <h5 class="card-title">Shortness of Breath</h5>
              <p class="card-text">Breathing difficulties may develop as the virus progresses.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Prevention Section -->
  <section id="prevention" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Prevention Tips</h2>
      <div class="row">
        <div class="col-md-3 text-center">
          <i class="fas fa-hand-sparkles fa-3x mb-3"></i>
          <h5>Wash Hands</h5>
          <p>Regularly wash your hands with soap and water for at least 20 seconds.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="fas fa-head-side-mask fa-3x mb-3"></i>
          <h5>Wear a Mask</h5>
          <p>Wear a mask to protect yourself and others when in public spaces.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="fas fa-people-arrows fa-3x mb-3"></i>
          <h5>Maintain Distance</h5>
          <p>Stay at least 6 feet apart from others to reduce transmission.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="fas fa-virus-slash fa-3x mb-3"></i>
          <h5>Disinfect Surfaces</h5>
          <p>Frequently clean and disinfect surfaces that are often touched.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Vaccination Information Section -->
  <section id="vaccination" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Vaccination Information</h2>
      <p class="text-center">Vaccines are safe and effective in preventing Covid-19 and reducing the severity of the disease. Here’s what you need to know:</p>
      <div class="row">
        <div class="col-md-4 text-center">
          <i class="fas fa-syringe fa-3x mb-3"></i>
          <h5>Types of Vaccines</h5>
          <p>There are several vaccines authorized for emergency use to combat Covid-19. Each vaccine has its own efficacy and safety profile.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-calendar-check fa-3x mb-3"></i>
          <h5>Vaccination Schedule</h5>
          <p>It's important to follow the recommended vaccination schedule for maximum protection. Most vaccines require two doses, while some require only one.</p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-shield-alt fa-3x mb-3"></i>
          <h5>Booster Shots</h5>
          <p>Booster shots may be necessary to maintain immunity. Stay informed about the latest guidelines regarding booster doses.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testing Centers Section -->
  <section id="testing-centers" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Covid-19 Testing Centers</h2>
      <p class="text-center">Find the nearest testing center to get tested for Covid-19. Below is a list of testing centers available:</p>
      <ul class="list-unstyled text-center">
        <li>City Hospital, Main St, Downtown</li>
        <li>Health Clinic, 2nd Ave, Westside</li>
        <li>Community Health Center, 3rd St, Eastside</li>
      </ul>
    </div>
  </section>

  <!-- Common Myths Section -->
  <section id="common-myths" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Common Myths About Covid-19</h2>
      <p class="text-center">Let's debunk some common myths about Covid-19:</p>
      <ul class="list-unstyled text-center">
        <li>Myth: Only old people can get infected. <br>Fact: People of all ages can be infected with Covid-19.</li>
        <li>Myth: Masks are ineffective against the virus. <br>Fact: Masks provide a level of protection and can reduce the spread.</li>
        <li>Myth: Covid-19 is just like the flu. <br>Fact: Covid-19 is caused by a different virus and can lead to more severe illness.</li>
      </ul>
    </div>
  </section>

  <!-- Resources Section -->
  <section id="resources" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">Resources for Further Information</h2>
      <p class="text-center">Stay informed with reliable sources:</p>
      <div class="row">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body text-center">
              <h5 class="card-title">World Health Organization (WHO)</h5>
              <p class="card-text">Visit the WHO website for the latest updates on Covid-19 guidelines and resources.</p>
              <a href="https://www.who.int/" target="_blank" class="btn btn-primary">Visit</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body text-center">
              <h5 class="card-title">Centers for Disease Control and Prevention (CDC)</h5>
              <p class="card-text">Access essential information about Covid-19 safety and prevention measures.</p>
              <a href="https://www.cdc.gov/" target="_blank" class="btn btn-primary">Visit</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body text-center">
              <h5 class="card-title">Ministry of Health and Family Welfare</h5>
              <p class="card-text">Get updates and guidelines from India's Ministry of Health regarding Covid-19.</p>
              <a href="https://www.mohfw.gov.in/" target="_blank" class="btn btn-primary">Visit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="text-center py-4">
    <div class="container">
      <p>&copy; 2024 Covid-19 Testing Management System. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
