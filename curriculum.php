<?php 
include 'db.php';

// Fetch curriculum data
$curriculumData = fetchAll("SELECT * FROM curriculum WHERE status = 'active' ORDER BY class_level, title");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum - Rehan School</title>
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
            max-width: 600px;
            margin: 0 auto;
        }

        .curriculum-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .curriculum-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border-top: 4px solid #667eea;
        }

        .curriculum-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .curriculum-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .curriculum-card .level {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .curriculum-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .curriculum-details {
            margin-top: 1.5rem;
        }

        .detail-section {
            margin-bottom: 1rem;
        }

        .detail-section h4 {
            color: #333;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .detail-section p {
            font-size: 0.9rem;
            color: #666;
        }

        .subjects-overview {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 4rem 0;
        }

        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .subject-item {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .subject-item:hover {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-3px);
        }

        .subject-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .subject-item h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .curriculum-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .subjects-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .subjects-grid {
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
                    <li><a href="#" onclick="navigateTo('how-to-copy.php')">How To Copy Rehan School</a></li>
                    <li><a href="#" onclick="navigateTo('video-tours.php')">Video Tours</a></li>
                    <li><a href="#" onclick="navigateTo('facilitators.php')">Facilitators</a></li>
                    <li><a href="curriculum.php" style="background: rgba(255,255,255,0.2);">Curriculum</a></li>
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
                <h1>Our Curriculum</h1>
                <p>Comprehensive educational programs designed to nurture young minds and prepare them for the future</p>
            </div>

            <!-- Subjects Overview -->
            <section class="subjects-overview">
                <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem; color: #333;">Core Subjects</h2>
                <p style="text-align: center; color: #666; margin-bottom: 2rem;">Our comprehensive curriculum covers all essential subjects for holistic development</p>
                
                <div class="subjects-grid">
                    <div class="subject-item">
                        <div class="subject-icon">📚</div>
                        <h4>English</h4>
                        <p>Language & Literature</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">🔢</div>
                        <h4>Mathematics</h4>
                        <p>Problem Solving & Logic</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">🔬</div>
                        <h4>Science</h4>
                        <p>Discovery & Innovation</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">🌍</div>
                        <h4>Social Studies</h4>
                        <p>Culture & Society</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">🎨</div>
                        <h4>Arts</h4>
                        <p>Creativity & Expression</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">💻</div>
                        <h4>Computer Science</h4>
                        <p>Technology & Programming</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">🏃</div>
                        <h4>Physical Education</h4>
                        <p>Health & Fitness</p>
                    </div>
                    <div class="subject-item">
                        <div class="subject-icon">☪️</div>
                        <h4>Islamic Studies</h4>
                        <p>Values & Ethics</p>
                    </div>
                </div>
            </section>

            <!-- Curriculum Details -->
            <section class="curriculum-section">
                <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; color: #333;">Curriculum by Level</h2>
                
                <div class="curriculum-grid">
                    <?php if ($curriculumData && count($curriculumData) > 0): ?>
                        <?php foreach ($curriculumData as $curriculum): ?>
                            <div class="curriculum-card">
                                <span class="level"><?php echo htmlspecialchars($curriculum['class_level']); ?></span>
                                <h3><?php echo htmlspecialchars($curriculum['title']); ?></h3>
                                <p><?php echo htmlspecialchars($curriculum['description']); ?></p>
                                
                                <div class="curriculum-details">
                                    <?php if (!empty($curriculum['content'])): ?>
                                        <div class="detail-section">
                                            <h4>Content Areas:</h4>
                                            <p><?php echo htmlspecialchars($curriculum['content']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($curriculum['learning_objectives'])): ?>
                                        <div class="detail-section">
                                            <h4>Learning Objectives:</h4>
                                            <p><?php echo htmlspecialchars($curriculum['learning_objectives']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($curriculum['assessment_methods'])): ?>
                                        <div class="detail-section">
                                            <h4>Assessment Methods:</h4>
                                            <p><?php echo htmlspecialchars($curriculum['assessment_methods']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default curriculum cards if no data in database -->
                        <div class="curriculum-card">
                            <span class="level">Pre-Primary</span>
                            <h3>Early Childhood Development</h3>
                            <p>Foundation program focusing on basic skills, social development, and creative expression through play-based learning.</p>
                            
                            <div class="curriculum-details">
                                <div class="detail-section">
                                    <h4>Content Areas:</h4>
                                    <p>Basic literacy, numeracy, motor skills, social skills, creative arts</p>
                                </div>
                                <div class="detail-section">
                                    <h4>Learning Objectives:</h4>
                                    <p>Develop foundational skills for formal education, foster creativity and social interaction</p>
                                </div>
                            </div>
                        </div>

                        <div class="curriculum-card">
                            <span class="level">Primary</span>
                            <h3>Primary Education Program</h3>
                            <p>Comprehensive primary curriculum covering core subjects with emphasis on critical thinking and problem-solving skills.</p>
                            
                            <div class="curriculum-details">
                                <div class="detail-section">
                                    <h4>Content Areas:</h4>
                                    <p>English, Mathematics, Science, Social Studies, Islamic Studies, Computer Science</p>
                                </div>
                                <div class="detail-section">
                                    <h4>Learning Objectives:</h4>
                                    <p>Build strong academic foundation, develop analytical thinking, promote collaborative learning</p>
                                </div>
                            </div>
                        </div>

                        <div class="curriculum-card">
                            <span class="level">Middle School</span>
                            <h3>Middle School Curriculum</h3>
                            <p>Advanced curriculum preparing students for higher education with specialized subjects and research projects.</p>
                            
                            <div class="curriculum-details">
                                <div class="detail-section">
                                    <h4>Content Areas:</h4>
                                    <p>Advanced Mathematics, Sciences, Literature, History, Technology, Arts</p>
                                </div>
                                <div class="detail-section">
                                    <h4>Learning Objectives:</h4>
                                    <p>Prepare for secondary education, develop research skills, encourage independent learning</p>
                                </div>
                            </div>
                        </div>

                        <div class="curriculum-card">
                            <span class="level">High School</span>
                            <h3>Secondary Education</h3>
                            <p>Comprehensive secondary program with multiple streams and career guidance to prepare students for university and professional life.</p>
                            
                            <div class="curriculum-details">
                                <div class="detail-section">
                                    <h4>Content Areas:</h4>
                                    <p>Science, Commerce, Arts streams with specialized subjects and practical training</p>
                                </div>
                                <div class="detail-section">
                                    <h4>Learning Objectives:</h4>
                                    <p>Prepare for higher education, develop career readiness, foster leadership skills</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
