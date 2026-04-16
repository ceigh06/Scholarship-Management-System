<div class="faqs-container">
    <div class="faqs-header">
        <h2>Frequently Asked Questions</h2>
        <p class="faqs-subtitle">Everything you need to know about the Gintong Kabataan Scholarship</p>
    </div>

    <div class="faq-list">

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>What is this scholarship?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>The Diwa ng Bayani Foundation Scholarship is a merit-based program that provides full tuition support
                    to deserving students who demonstrate academic excellence and financial need.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>How do I apply?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>Create an account using a valid email address, then log in to access the application form. Fill out
                    all required fields and submit your application before the deadline.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>Why do I need a valid email?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>Your email is your primary login credential and the main channel for receiving updates,
                    notifications, and decisions about your application status.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>How do I keep my account safe?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>Keep your User ID and personal information strictly confidential. Never share your login credentials
                    with anyone, including friends or family members.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>Can I create more than one account?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>No. Multiple accounts per applicant are strictly prohibited and may result in disqualification. Each
                    student is allowed only one application per scholarship cycle.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>What happens after I register?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>After registration, you can log in, complete the application form, and track your application status
                    in real-time through your student dashboard.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>What if I can't log in?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>Double-check your registered email address and password. If the problem persists, contact our support
                    team for assistance — do not create a second account.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question" aria-expanded="false">
                <span>Is my information safe?</span>
                <span class="faq-icon">&#43;</span>
            </button>
            <div class="faq-answer">
                <p>Absolutely. All personal data you submit is kept strictly confidential and is used solely for the
                    purpose of evaluating your scholarship application.</p>
            </div>
        </div>

    </div>
</div>

<script>
    (function () {
        const questions = document.querySelectorAll('.faq-question');
        questions.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const isOpen = this.getAttribute('aria-expanded') === 'true';
                // Close all
                questions.forEach(function (q) {
                    q.setAttribute('aria-expanded', 'false');
                    q.closest('.faq-item').classList.remove('open');
                });
                // Toggle current
                if (!isOpen) {
                    this.setAttribute('aria-expanded', 'true');
                    this.closest('.faq-item').classList.add('open');
                }
            });
        });
    })();
</script>