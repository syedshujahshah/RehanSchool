<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How To Copy Rehan School - Rehan School</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: #ffd700;
            border-radius: 10px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-menu li a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            padding: 4rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 3rem 0;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .page-header h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .page-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        .intro-section {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 3rem 0;
        }

        .intro-section h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .intro-section p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            text-align: center;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .steps-container {
            margin: 4rem 0;
        }

        .step-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-left: 5px solid #667eea;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .step-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 1.5rem;
        }

        .step-title {
            font-size: 1.8rem;
            color: #333;
            font-weight: 600;
        }

        .step-content {
            margin-left: 75px;
        }

        .step-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .step-content ul {
            color: #666;
            margin-left: 2rem;
            margin-bottom: 1rem;
        }

        .step-content li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .highlight-box {
            background: linear-gradient(45deg, #e3f2fd, #f3e5f5);
            border: 2px solid #667eea;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
        }

        .highlight-box h4 {
            color: #667eea;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .highlight-box p {
            color: #555;
            margin: 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
            text-align: center;
            margin: 4rem 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            background: #ffd700;
            color: #333;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255,215,0,0.3);
        }

        .warning-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .warning-box h4 {
            color: #856404;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .warning-box p {
            color: #856404;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .step-content {
                margin-left: 0;
                margin-top: 1rem;
            }

            .step-header {
                flex-direction: column;
                text-align: center;
            }

            .step-number {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <div class="logo-icon">🎓</div>
                Rehan School
            </a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#" onclick="navigateTo('index.php')">Home</a></li>
                    <li><a href="how-to-copy.php" style="background: rgba(255,255,255,0.2);">How To Copy Rehan School</a></li>
                    <li><a href="#" onclick="navigateTo('video-tours.php')">Video Tours</a></li>
                    <li><a href="#" onclick="navigateTo('facilitators.php')">Facilitators</a></li>
                    <li><a href="#" onclick="navigateTo('curriculum.php')">Curriculum</a></li>
                    <li><a href="#" onclick="navigateTo('videos.php')">Videos</a></li>
                    <li><a href="#" onclick="navigateTo('about.php')">About Us</a></li>
                    <li><a href="#" onclick="navigateTo('contact.php')">Contact Us</a></li>
                    <li><a href="#" onclick="navigateTo('faqs.php')">FAQs</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1>How To Copy Rehan School</h1>
                <p>A comprehensive guide to replicating our successful educational model and creating your own world-class institution</p>
            </div>

            <!-- Introduction Section -->
            <section class="intro-section">
                <h2>Why Copy Our Model?</h2>
                <p>Rehan School has established itself as a leader in innovative education, combining traditional values with cutting-edge technology. Our proven methodology has produced exceptional results, and we believe in sharing our success to improve education globally.</p>
                <p>This guide will walk you through the essential steps to establish an educational institution based on our successful framework.</p>
            </section>

            <!-- Key Features Section -->
            <section class="features-section">
                <h2 style="text-align: center; font-size: 2.5rem; margin: 3rem 0; color: #333;">What Makes Our Model Unique</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🎯</div>
                        <h3>Proven Success</h3>
                        <p>Our educational model has consistently delivered outstanding academic results and character development.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💡</div>
                        <h3>Innovation Focus</h3>
                        <p>Integration of AI and modern technology with traditional teaching methods for enhanced learning.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🌟</div>
                        <h3>Holistic Approach</h3>
                        <p>Comprehensive development covering academics, character building, and practical life skills.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h3>Community Impact</h3>
                        <p>Strong community engagement and parent involvement in the educational process.</p>
                    </div>
                </div>
            </section>

            <!-- Steps Section -->
            <section class="steps-container">
                <h2 style="text-align: center; font-size: 2.5rem; margin: 3rem 0; color: #333;">Step-by-Step Implementation Guide</h2>

                <!-- Step 1 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">1</div>
                        <div class="step-title">Vision & Mission Development</div>
                    </div>
                    <div class="step-content">
                        <p>Start by establishing a clear vision and mission that aligns with our core principles of creating leaders and problem-solvers.</p>
                        <ul>
                            <li>Define your educational philosophy</li>
                            <li>Establish core values and principles</li>
                            <li>Create a mission statement focused on leadership development</li>
                            <li>Set measurable goals and objectives</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>💡 Key Insight:</h4>
                            <p>Our motto "Where Leaders Are Made, Not Born" should be reflected in every aspect of your institution's culture and curriculum.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">2</div>
                        <div class="step-title">Infrastructure & Facilities Planning</div>
                    </div>
                    <div class="step-content">
                        <p>Design and develop world-class facilities that support innovative learning and holistic development.</p>
                        <ul>
                            <li>Modern classrooms with smart technology</li>
                            <li>State-of-the-art computer laboratories</li>
                            <li>Well-equipped science laboratories</li>
                            <li>Comprehensive library and resource center</li>
                            <li>Sports and recreational facilities</li>
                            <li>Arts and creativity spaces</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>🏗️ Infrastructure Requirements:</h4>
                            <p>Minimum 2-3 acres of land, modern building design with natural lighting, proper ventilation, and accessibility features.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">3</div>
                        <div class="step-title">Curriculum Development</div>
                    </div>
                    <div class="step-content">
                        <p>Develop an innovative curriculum that balances academic excellence with character development and practical skills.</p>
                        <ul>
                            <li>Integrate national curriculum standards</li>
                            <li>Add AI and technology components</li>
                            <li>Include character development programs</li>
                            <li>Design project-based learning modules</li>
                            <li>Create assessment and evaluation systems</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>📚 Curriculum Focus Areas:</h4>
                            <p>Core subjects, STEM education, language development, arts, physical education, and life skills training.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">4</div>
                        <div class="step-title">Staff Recruitment & Training</div>
                    </div>
                    <div class="step-content">
                        <p>Build a team of qualified, passionate educators who share your vision and commitment to excellence.</p>
                        <ul>
                            <li>Recruit experienced and qualified teachers</li>
                            <li>Provide comprehensive training programs</li>
                            <li>Establish continuous professional development</li>
                            <li>Create mentorship programs</li>
                            <li>Implement performance evaluation systems</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>👥 Staffing Requirements:</h4>
                            <p>Maintain a student-teacher ratio of 15:1, hire subject specialists, and ensure all staff have relevant qualifications and experience.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">5</div>
                        <div class="step-title">Technology Integration</div>
                    </div>
                    <div class="step-content">
                        <p>Implement cutting-edge technology to enhance learning experiences and prepare students for the digital future.</p>
                        <ul>
                            <li>Install smart classroom technology</li>
                            <li>Implement learning management systems</li>
                            <li>Integrate AI-powered educational tools</li>
                            <li>Provide digital literacy training</li>
                            <li>Establish robust IT infrastructure</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>💻 Technology Essentials:</h4>
                            <p>High-speed internet, interactive whiteboards, tablets/computers for students, educational software, and security systems.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">6</div>
                        <div class="step-title">Quality Assurance & Accreditation</div>
                    </div>
                    <div class="step-content">
                        <p>Establish quality standards and obtain necessary accreditations to ensure credibility and excellence.</p>
                        <ul>
                            <li>Obtain government registration and licenses</li>
                            <li>Apply for educational board affiliations</li>
                            <li>Implement quality management systems</li>
                            <li>Establish regular audit processes</li>
                            <li>Maintain compliance with regulations</li>
                        </ul>
                        <div class="warning-box">
                            <h4>⚠️ Important Note:</h4>
                            <p>Ensure all legal requirements are met before starting operations. Consult with education authorities and legal experts.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 7 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">7</div>
                        <div class="step-title">Marketing & Community Engagement</div>
                    </div>
                    <div class="step-content">
                        <p>Build awareness and trust in your community through effective marketing and engagement strategies.</p>
                        <ul>
                            <li>Develop a strong brand identity</li>
                            <li>Create professional website and materials</li>
                            <li>Engage with local community</li>
                            <li>Organize open houses and events</li>
                            <li>Build partnerships with local organizations</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>📢 Marketing Strategy:</h4>
                            <p>Focus on showcasing your unique value proposition, success stories, and commitment to excellence in education.</p>
                        </div>
                    </div>
                </div>

                <!-- Step 8 -->
                <div class="step-card">
                    <div class="step-header">
                        <div class="step-number">8</div>
                        <div class="step-title">Launch & Continuous Improvement</div>
                    </div>
                    <div class="step-content">
                        <p>Successfully launch your institution and establish systems for ongoing improvement and growth.</p>
                        <ul>
                            <li>Conduct soft opening with limited enrollment</li>
                            <li>Gather feedback from students and parents</li>
                            <li>Implement continuous improvement processes</li>
                            <li>Monitor academic and operational performance</li>
                            <li>Plan for expansion and growth</li>
                        </ul>
                        <div class="highlight-box">
                            <h4>🚀 Success Metrics:</h4>
                            <p>Track student performance, parent satisfaction, teacher retention, and community reputation to measure success.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <h2>Ready to Start Your Educational Journey?</h2>
                <p>Join the growing network of institutions inspired by the Rehan School model. Together, we can transform education and create more leaders for tomorrow.</p>
                <a href="#" onclick="navigateTo('contact.php')" class="cta-button">Contact Us for Support</a>
            </section>

            <!-- Additional Resources -->
            <section class="intro-section">
                <h2>Additional Resources & Support</h2>
                <p>We provide ongoing support to institutions implementing our model:</p>
                <ul style="max-width: 800px; margin: 2rem auto; text-align: left;">
                    <li><strong>Consultation Services:</strong> Expert guidance throughout the setup process</li>
                    <li><strong>Training Programs:</strong> Comprehensive staff training and development</li>
                    <li><strong>Curriculum Materials:</strong> Ready-to-use educational resources and materials</li>
                    <li><strong>Technology Support:</strong> Assistance with technology integration and setup</li>
                    <li><strong>Quality Assurance:</strong> Regular audits and improvement recommendations</li>
                    <li><strong>Networking Opportunities:</strong> Connect with other institutions in our network</li>
                </ul>
                <div class="warning-box">
                    <h4>📞 Get Professional Support:</h4>
                    <p>While this guide provides a comprehensive overview, we strongly recommend consulting with our experts for personalized guidance and support throughout your implementation journey.</p>
                </div>
            </section>
        </div>
    </main>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }

        // Smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll animation for step cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Initially hide step cards and observe them
        document.querySelectorAll('.step-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });
    </script>
</body>
</html>
