<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test portfolio homepage renders successfully with status 200.
     */
    public function test_portfolio_page_loads_successfully(): void
    {
        $this->withoutVite();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Ibrahim', false);
    }

    /**
     * Test portfolio page renders all expected partials and yield content.
     */
    public function test_portfolio_page_renders_all_partials_and_yield_content(): void
    {
        $this->withoutVite();

        $response = $this->get('/');

        $response->assertStatus(200);
        // Verify navbar
        $response->assertSee('id="mobileMenuToggleBtn"', false);
        // Verify hero section
        $response->assertSee('id="hero"', false);
        // Verify about section
        $response->assertSee('id="about"', false);
        // Verify skills section
        $response->assertSee('id="skills"', false);
        // Verify projects section
        $response->assertSee('id="projects"', false);
        // Verify experience section
        $response->assertSee('id="experience"', false);
        // Verify contact section
        $response->assertSee('id="contact"', false);
        // Verify footer section
        $response->assertSee('Hak Cipta Dilindungi Undang-Undang', false);
    }

    /**
     * Test portfolio contains mobile responsive drawer and controls.
     */
    public function test_portfolio_contains_mobile_responsive_controls(): void
    {
        $this->withoutVite();

        $response = $this->get('/');

        $response->assertSee('id="mobileMenu"', false);
        $response->assertSee('viewport', false);
        $response->assertSee('width=device-width', false);
    }
}
