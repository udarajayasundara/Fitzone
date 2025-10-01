<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Benefits of Group Classes</title>
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Helvetica Neue', Arial, sans-serif;
    }
    
    body {
      background-color: #f5f5f5;
      color: #1a1a1a;
      line-height: 1.6;
    }
    
    /* Header */
    header {
      background-color: #000;
      color: #fff;
      padding: 2rem 0;
      text-align: center;
      position: relative;
    }
    
    .header-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
    }
    
    h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      position: relative;
      display: inline-block;
    }
    
    h1::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background-color: #e21818;
    }
    
    .tagline {
      font-size: 1.2rem;
      font-weight: 300;
      margin-top: 1.5rem;
    }
    
    /* Main Content */
    main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
    }
    
    .intro {
      text-align: center;
      margin-bottom: 3rem;
    }
    
    .intro p {
      max-width: 800px;
      margin: 0 auto;
      font-size: 1.1rem;
    }
    
    .benefits-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }
    
    .benefit-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .benefit-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .benefit-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 5px;
      height: 100%;
      background-color: #e21818;
    }
    
    .benefit-card h3 {
      margin-bottom: 1rem;
      font-size: 1.5rem;
      color: #000;
    }
    
    .benefit-card p {
      color: #555;
    }
    
    /* Call to Action */
    .cta-section {
      margin-top: 4rem;
      text-align: center;
      background-color: #000;
      color: #fff;
      padding: 3rem;
      border-radius: 8px;
    }
    
    .cta-section h2 {
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }
    
    .cta-btn {
      display: inline-block;
      background-color: #e21818;
      color: #fff;
      padding: 0.8rem 2rem;
      border-radius: 50px;
      font-weight: bold;
      text-decoration: none;
      margin-top: 1rem;
      transition: background-color 0.3s ease;
    }
    
    .cta-btn:hover {
      background-color: #c01010;
    }
    
    /* Footer */
    footer {
      background-color: #000;
      color: #fff;
      text-align: center;
      padding: 2rem 0;
      margin-top: 4rem;
    }
    
    footer p {
      max-width: 800px;
      margin: 0 auto;
      font-size: 0.9rem;
      opacity: 0.7;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }
      
      .benefit-card {
        padding: 1.5rem;
      }
      
      .cta-section {
        padding: 2rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <h1>The Benefits of Group Classes</h1>
      <p class="tagline">Learn together, grow together, succeed together</p>
    </div>
  </header>
  
  <main>
    <section class="intro">
      <p>Discover why group classes are becoming increasingly popular and how they can enhance your learning experience. From motivation to social connections, group learning environments offer unique advantages that can accelerate your progress and enrich your journey.</p>
    </section>
    
    <section class="benefits-container">
      <div class="benefit-card">
        <h3>Increased Motivation</h3>
        <p>The energy of a group setting naturally boosts motivation levels. When you see others working hard and making progress, it inspires you to push yourself further than you might on your own.</p>
      </div>
      
      <div class="benefit-card">
        <h3>Social Connection</h3>
        <p>Group classes create a community of like-minded individuals with similar goals. These connections can lead to friendships, study groups, and a support network that extends beyond the classroom.</p>
      </div>
      
      <div class="benefit-card">
        <h3>Diverse Perspectives</h3>
        <p>Learning alongside others exposes you to different viewpoints and approaches. This diversity enhances your understanding and helps you develop more well-rounded knowledge of the subject.</p>
      </div>
      
      <div class="benefit-card">
        <h3>Cost-Effective Learning</h3>
        <p>Group classes are typically more affordable than private lessons, making quality instruction accessible to more people without compromising on the learning experience.</p>
      </div>
      
      <div class="benefit-card">
        <h3>Healthy Competition</h3>
        <p>A little friendly competition can be a powerful motivator. Group settings naturally foster a spirit of positive competition that can drive everyone to achieve better results.</p>
      </div>
      
      <div class="benefit-card">
        <h3>Regular Schedule</h3>
        <p>Group classes follow a set schedule, which helps establish consistency in your learning routine. This structure makes it easier to commit to regular practice and steady progress.</p>
      </div>
    </section>
  </main>
  
</body>
</html>