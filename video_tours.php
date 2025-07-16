<?php 
include 'db.php';

// Fetch video tours data
$videoTours = fetchAll("SELECT * FROM videos WHERE category = 'tour' AND status = 'active' ORDER BY created_at DESC");
$allVideos = fetchAll("SELECT * FROM videos WHERE status = 'active' ORDER BY category, created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Tours - Rehan School</title>
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

        /* Featured Video Section */
        .featured-video {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin: 3rem 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .featured-video h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .video-player {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 16/9;
        }

        .video-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .video-placeholder:hover {
            background: linear-gradient(45deg, #5a6fd8, #6a4190);
        }

        .video-placeholder .play-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .video-placeholder .video-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .video-placeholder .video-duration {
            font-size: 1rem;
            opacity: 0.8;
        }

        /* Video Grid */
        .video-section {
            margin: 4rem 0;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            color: #333;
            margin-bottom: 3rem;
        }

        .video-filters {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.8rem 1.5rem;
            border: 2px solid #667eea;
            background: white;
            color: #667eea;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .videos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .video-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .video-thumbnail {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            cursor: pointer;
        }

        .video-thumbnail .play-button {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #667eea;
            transition: all 0.3s ease;
        }

        .video-thumbnail .play-button:hover {
            background: white;
            transform: scale(1.1);
        }

        .video-content {
            padding: 1.5rem;
        }

        .video-category {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 15px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .video-title {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .video-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .video-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #999;
        }

        .video-duration {
            background: #f8f9fa;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
        }

        .video-views {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Tour Categories */
        .tour-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .category-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .category-icon {
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

        .category-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .category-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            position: relative;
            margin: 5% auto;
            width: 90%;
            max-width: 900px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-header {
            padding: 1rem 2rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            padding: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .close-btn:hover {
            background: rgba(255,255,255,0.2);
        }

        .modal-video {
            width: 100%;
            aspect-ratio: 16/9;
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .modal-body {
            padding: 2rem;
        }

        .modal-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .modal-meta {
            display: flex;
            gap: 2rem;
            font-size: 0.9rem;
            color: #999;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .videos-grid {
                grid-template-columns: 1fr;
            }

            .tour-categories {
                grid-template-columns: 1fr;
            }

            .video-filters {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }

            .modal-content {
                margin: 10% auto;
                width: 95%;
            }

            .modal-body {
                padding: 1rem;
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
                    <li><a href="video-tours.php" style="background: rgba(255,255,255,0.2);">Video Tours</a></li>
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
                <h1>Virtual School Tours</h1>
                <p>Explore our campus, facilities, and learning environment through immersive video tours</p>
            </div>

            <!-- Featured Video -->
            <section class="featured-video">
                <h2>Complete Campus Tour</h2>
                <div class="video-player">
                    <div class="video-placeholder" onclick="openVideoModal('Complete Campus Tour', 'Take a comprehensive tour of our entire campus including classrooms, laboratories, library, sports facilities, and more.', '15:30')">
                        <div class="play-icon">▶️</div>
                        <div class="video-title">Complete Campus Walkthrough</div>
                        <div class="video-duration">Duration: 15:30</div>
                    </div>
                </div>
            </section>

            <!-- Tour Categories -->
            <section class="video-section">
                <h2 class="section-title">Explore Different Areas</h2>
                <div class="tour-categories">
                    <div class="category-card" onclick="filterVideos('classrooms')">
                        <div class="category-icon">🏫</div>
                        <h3>Classrooms</h3>
                        <p>Modern, technology-equipped classrooms designed for interactive learning</p>
                    </div>
                    <div class="category-card" onclick="filterVideos('laboratories')">
                        <div class="category-icon">🔬</div>
                        <h3>Laboratories</h3>
                        <p>State-of-the-art science and computer labs with latest equipment</p>
                    </div>
                    <div class="category-card" onclick="filterVideos('library')">
                        <div class="category-icon">📚</div>
                        <h3>Library</h3>
                        <p>Comprehensive library with books, digital resources, and study areas</p>
                    </div>
                    <div class="category-card" onclick="filterVideos('sports')">
                        <div class="category-icon">⚽</div>
                        <h3>Sports Facilities</h3>
                        <p>Indoor and outdoor sports facilities for physical development</p>
                    </div>
                    <div class="category-card" onclick="filterVideos('cafeteria')">
                        <div class="category-icon">🍽️</div>
                        <h3>Cafeteria</h3>
                        <p>Clean, spacious dining area serving nutritious meals</p>
                    </div>
                    <div class="category-card" onclick="filterVideos('arts')">
                        <div class="category-icon">🎨</div>
                        <h3>Arts Studio</h3>
                        <p>Creative spaces for arts, crafts, and artistic expression</p>
                    </div>
                </div>
            </section>

            <!-- Video Filters -->
            <section class="video-section">
                <h2 class="section-title">Video Tours Collection</h2>
                <div class="video-filters">
                    <button class="filter-btn active" onclick="filterVideos('all')">All Tours</button>
                    <button class="filter-btn" onclick="filterVideos('tour')">Campus Tours</button>
                    <button class="filter-btn" onclick="filterVideos('curriculum')">Academic Programs</button>
                    <button class="filter-btn" onclick="filterVideos('events')">School Events</button>
                    <button class="filter-btn" onclick="filterVideos('testimonials')">Student Life</button>
                </div>

                <!-- Videos Grid -->
                <div class="videos-grid" id="videosGrid">
                    <?php if ($allVideos && count($allVideos) > 0): ?>
                        <?php foreach ($allVideos as $video): ?>
                            <div class="video-card" data-category="<?php echo htmlspecialchars($video['category']); ?>">
                                <div class="video-thumbnail" onclick="openVideoModal('<?php echo htmlspecialchars($video['title']); ?>', '<?php echo htmlspecialchars($video['description']); ?>', '<?php echo htmlspecialchars($video['duration'] ?? '5:00'); ?>')">
                                    <span>🎥</span>
                                    <div class="play-button">▶️</div>
                                </div>
                                <div class="video-content">
                                    <span class="video-category"><?php echo ucfirst(htmlspecialchars($video['category'])); ?></span>
                                    <h3 class="video-title"><?php echo htmlspecialchars($video['title']); ?></h3>
                                    <p class="video-description"><?php echo htmlspecialchars(substr($video['description'], 0, 100)) . '...'; ?></p>
                                    <div class="video-meta">
                                        <span class="video-duration"><?php echo htmlspecialchars($video['duration'] ?? '5:00'); ?></span>
                                        <span class="video-views">👁️ <?php echo number_format($video['views']); ?> views</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default video cards if no data in database -->
                        <div class="video-card" data-category="tour">
                            <div class="video-thumbnail" onclick="openVideoModal('Main Building Tour', 'Explore our main academic building with modern classrooms, administrative offices, and student facilities.', '8:45')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Tour</span>
                                <h3 class="video-title">Main Building Tour</h3>
                                <p class="video-description">Explore our main academic building with modern classrooms and facilities...</p>
                                <div class="video-meta">
                                    <span class="video-duration">8:45</span>
                                    <span class="video-views">👁️ 1,234 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="tour">
                            <div class="video-thumbnail" onclick="openVideoModal('Science Laboratory Tour', 'Take a detailed look at our state-of-the-art science laboratories equipped with modern instruments.', '6:20')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Tour</span>
                                <h3 class="video-title">Science Laboratory Tour</h3>
                                <p class="video-description">State-of-the-art science laboratories with modern equipment and safety features...</p>
                                <div class="video-meta">
                                    <span class="video-duration">6:20</span>
                                    <span class="video-views">👁️ 987 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="tour">
                            <div class="video-thumbnail" onclick="openVideoModal('Computer Lab Tour', 'Discover our advanced computer laboratory with latest technology and software.', '5:15')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Tour</span>
                                <h3 class="video-title">Computer Lab Tour</h3>
                                <p class="video-description">Advanced computer laboratory with latest technology for digital learning...</p>
                                <div class="video-meta">
                                    <span class="video-duration">5:15</span>
                                    <span class="video-views">👁️ 756 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="tour">
                            <div class="video-thumbnail" onclick="openVideoModal('Library Tour', 'Visit our comprehensive library with extensive book collection and digital resources.', '7:30')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Tour</span>
                                <h3 class="video-title">Library Tour</h3>
                                <p class="video-description">Comprehensive library with books, digital resources, and quiet study areas...</p>
                                <div class="video-meta">
                                    <span class="video-duration">7:30</span>
                                    <span class="video-views">👁️ 654 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="tour">
                            <div class="video-thumbnail" onclick="openVideoModal('Sports Facilities Tour', 'Explore our indoor and outdoor sports facilities including gymnasium and playgrounds.', '9:10')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Tour</span>
                                <h3 class="video-title">Sports Facilities Tour</h3>
                                <p class="video-description">Indoor and outdoor sports facilities for comprehensive physical development...</p>
                                <div class="video-meta">
                                    <span class="video-duration">9:10</span>
                                    <span class="video-views">👁️ 543 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="curriculum">
                            <div class="video-thumbnail" onclick="openVideoModal('AI-Enabled Learning', 'See how we integrate artificial intelligence and modern technology in our curriculum.', '12:00')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Curriculum</span>
                                <h3 class="video-title">AI-Enabled Learning</h3>
                                <p class="video-description">Integration of AI and modern technology in our innovative curriculum...</p>
                                <div class="video-meta">
                                    <span class="video-duration">12:00</span>
                                    <span class="video-views">👁️ 1,876 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="events">
                            <div class="video-thumbnail" onclick="openVideoModal('Annual Day Celebration', 'Highlights from our annual day celebration showcasing student talents and achievements.', '15:45')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Events</span>
                                <h3 class="video-title">Annual Day Celebration</h3>
                                <p class="video-description">Highlights from our annual celebration showcasing student talents...</p>
                                <div class="video-meta">
                                    <span class="video-duration">15:45</span>
                                    <span class="video-views">👁️ 2,345 views</span>
                                </div>
                            </div>
                        </div>

                        <div class="video-card" data-category="testimonials">
                            <div class="video-thumbnail" onclick="openVideoModal('Student Life at Rehan School', 'Current students share their experiences and daily life at Rehan School.', '10:30')">
                                <span>🎥</span>
                                <div class="play-button">▶️</div>
                            </div>
                            <div class="video-content">
                                <span class="video-category">Testimonials</span>
                                <h3 class="video-title">Student Life at Rehan School</h3>
                                <p class="video-description">Current students share their experiences and daily school life...</p>
                                <div class="video-meta">
                                    <span class="video-duration">10:30</span>
                                    <span class="video-views">👁️ 1,567 views</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>

    <!-- Video Modal -->
    <div id="videoModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Video Title</h3>
                <button class="close-btn" onclick="closeVideoModal()">&times;</button>
            </div>
            <div class="modal-video">
                <span style="font-size: 4rem;">🎥</span>
            </div>
            <div class="modal-body">
                <p class="modal-description" id="modalDescription">Video description will appear here.</p>
                <div class="modal-meta">
                    <span id="modalDuration">Duration: 0:00</span>
                    <span>Category: School Tour</span>
                    <span>Quality: HD</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }

        // Filter videos by category
        function filterVideos(category) {
            const videoCards = document.querySelectorAll('.video-card');
            const filterBtns = document.querySelectorAll('.filter-btn');
            
            // Update active filter button
            filterBtns.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            // Show/hide video cards
            videoCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Open video modal
        function openVideoModal(title, description, duration) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('modalDuration').textContent = 'Duration: ' + duration;
            document.getElementById('videoModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Close video modal
        function closeVideoModal() {
            document.getElementById('videoModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('videoModal');
            if (event.target === modal) {
                closeVideoModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeVideoModal();
            }
        });

        // Add animation on scroll
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

        // Initially hide video cards and observe them
        document.querySelectorAll('.video-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });

        // Category card click handlers
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', function() {
                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-5px)';
                }, 150);
            });
        });
    </script>
</body>
</html>
