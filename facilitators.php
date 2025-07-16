<?php 
include 'db.php';

// Fetch facilitators data
$facilitators = fetchAll("SELECT * FROM facilitators WHERE status = 'active' ORDER BY type, name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilitators - Rehan School</title>
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

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin: 4rem 0 2rem;
            color: #333;
        }

        .facilitators-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .facilitator-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .facilitator-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .facilitator-card.person {
            border-top: 4px solid #4caf50;
        }

        .facilitator-card.facility {
            border-top: 4px solid #2196f3;
        }

        .facilitator-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .facility-image {
            width: 120px;
            height: 120px;
            border-radius: 15px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(45deg, #2196f3, #21cbf3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .facilitator-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .facilitator-card .designation {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .facilitator-card .department {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .facilitator-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .qualifications {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
        }

        .qualifications h4 {
            color: #333;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .qualifications p {
            font-size: 0.9rem;
            color: #666;
        }

        .contact-info {
            margin-top: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .contact-info h4 {
            color: #333;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .facilitators-grid {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
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
                    <li><a href="facilitators.php" style="background: rgba(255,255,255,0.2);">Facilitators</a></li>
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
                <h1>Our Facilitators</h1>
                <p>Meet our dedicated team of educators and explore our world-class facilities</p>
            </div>

            <!-- Staff Section -->
            <h2 class="section-title">Our Teaching Staff</h2>
            <div class="facilitators-grid">
                <?php 
                $staff_found = false;
                if ($facilitators && count($facilitators) > 0): 
                    foreach ($facilitators as $facilitator): 
                        if ($facilitator['type'] == 'person'):
                            $staff_found = true;
                ?>
                    <div class="facilitator-card person">
                        <div class="facilitator-image">👨‍🏫</div>
                        <h3><?php echo htmlspecialchars($facilitator['name']); ?></h3>
                        <?php if (!empty($facilitator['designation'])): ?>
                            <div class="designation"><?php echo htmlspecialchars($facilitator['designation']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($facilitator['department'])): ?>
                            <div class="department"><?php echo htmlspecialchars($facilitator['department']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($facilitator['description'])): ?>
                            <p><?php echo htmlspecialchars($facilitator['description']); ?></p>
                        <?php endif; ?>
                        
                        <?php if (!empty($facilitator['qualifications'])): ?>
                            <div class="qualifications">
                                <h4>Qualifications:</h4>
                                <p><?php echo htmlspecialchars($facilitator['qualifications']); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($facilitator['contact_info'])): ?>
                            <div class="contact-info">
                                <h4>Contact:</h4>
                                <p><?php echo htmlspecialchars($facilitator['contact_info']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php 
                        endif;
                    endforeach; 
                endif;
                
                if (!$staff_found): 
                ?>
                    <!-- Default staff cards if no data in database -->
                    <div class="facilitator-card person">
                        <div class="facilitator-image">👨‍🏫</div>
                        <h3>Dr. Muhammad Rehan</h3>
                        <div class="designation">Principal</div>
                        <div class="department">Administration</div>
                        <p>Experienced educator with 20+ years in educational leadership. Committed to excellence in education and student development.</p>
                        
                        <div class="qualifications">
                            <h4>Qualifications:</h4>
                            <p>Ph.D. in Education, M.Ed. Educational Leadership</p>
                        </div>
                    </div>

                    <div class="facilitator-card person">
                        <div class="facilitator-image">👩‍🏫</div>
                        <h3>Ms. Fatima Khan</h3>
                        <div class="designation">Vice Principal</div>
                        <div class="department">Academic Affairs</div>
                        <p>Expert in curriculum development and student affairs with a passion for innovative teaching methods.</p>
                        
                        <div class="qualifications">
                            <h4>Qualifications:</h4>
                            <p>M.Ed. Curriculum & Instruction, B.Ed.</p>
                        </div>
                    </div>

                    <div class="facilitator-card person">
                        <div class="facilitator-image">👨‍💻</div>
                        <h3>Mr. Ahmed Ali</h3>
                        <div class="designation">IT Coordinator</div>
                        <div class="department">Technology</div>
                        <p>Technology specialist focused on integrating AI and modern tools into education.</p>
                        
                        <div class="qualifications">
                            <h4>Qualifications:</h4>
                            <p>M.S. Computer Science, Certified IT Professional</p>
                        </div>
                    </div>

                    <div class="facilitator-card person">
                        <div class="facilitator-image">👩‍🔬</div>
                        <h3>Dr. Sarah Ahmed</h3>
                        <div class="designation">Science Department Head</div>
                        <div class="department">Sciences</div>
                        <p>Passionate science educator with expertise in hands-on learning and laboratory instruction.</p>
                        
                        <div class="qualifications">
                            <h4>Qualifications:</h4>
                            <p>Ph.D. Chemistry, M.S. Education</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Facilities Section -->
            <h2 class="section-title">Our Facilities</h2>
            <div class="facilitators-grid">
                <?php 
                $facilities_found = false;
                if ($facilitators && count($facilitators) > 0): 
                    foreach ($facilitators as $facilitator): 
                        if ($facilitator['type'] == 'facility'):
                            $facilities_found = true;
                ?>
                    <div class="facilitator-card facility">
                        <div class="facility-image">🏢</div>
                        <h3><?php echo htmlspecialchars($facilitator['name']); ?></h3>
                        <?php if (!empty($facilitator['designation'])): ?>
                            <div class="designation"><?php echo htmlspecialchars($facilitator['designation']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($facilitator['department'])): ?>
                            <div class="department"><?php echo htmlspecialchars($facilitator['department']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($facilitator['description'])): ?>
                            <p><?php echo htmlspecialchars($facilitator['description']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php 
                        endif;
                    endforeach; 
                endif;
                
                if (!$facilities_found): 
                ?>
                    <!-- Default facility cards if no data in database -->
                    <div class="facilitator-card facility">
                        <div class="facility-image">💻</div>
                        <h3>Computer Laboratory</h3>
                        <div class="designation">Technology Center</div>
                        <div class="department">IT Department</div>
                        <p>State-of-the-art computer laboratory equipped with latest hardware and software for hands-on learning in technology and programming.</p>
                    </div>

                    <div class="facilitator-card facility">
                        <div class="facility-image">🔬</div>
                        <h3>Science Laboratory</h3>
                        <div class="designation">Research Center</div>
                        <div class="department">Science Department</div>
                        <p>Well-equipped science laboratory with modern instruments and safety equipment for practical experiments and research activities.</p>
                    </div>

                    <div class="facilitator-card facility">
                        <div class="facility-image">📚</div>
                        <h3>Library</h3>
                        <div class="designation">Learning Resource Center</div>
                        <div class="department">Academic Support</div>
                        <p>Extensive collection of books, digital resources, and quiet study spaces to support student learning and research.</p>
                    </div>

                    <div class="facilitator-card facility">
                        <div class="facility-image">🏃</div>
                        <h3>Sports Complex</h3>
                        <div class="designation">Athletic Center</div>
                        <div class="department">Physical Education</div>
                        <p>Modern sports facilities including gymnasium, playground, and courts for various sports and physical activities.</p>
                    </div>

                    <div class="facilitator-card facility">
                        <div class="facility-image">🎭</div>
                        <h3>Arts & Crafts Studio</h3>
                        <div class="designation">Creative Center</div>
                        <div class="department">Arts Department</div>
                        <p>Dedicated space for artistic expression with supplies and tools for painting, crafts, and creative projects.</p>
                    </div>

                    <div class="facilitator-card facility">
                        <div class="facility-image">🍽️</div>
                        <h3>Cafeteria</h3>
                        <div class="designation">Dining Hall</div>
                        <div class="department">Student Services</div>
                        <p>Clean and spacious dining area serving nutritious meals and snacks in a comfortable environment.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
