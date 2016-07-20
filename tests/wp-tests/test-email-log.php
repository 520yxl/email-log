<?php

/**
 * Test main plugin class.
 */
class Email_Log_Tests extends WP_UnitTestCase {
	protected $object;

	public function setUp() {
		parent::setUp();
		$this->object = new EmailLog();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * Test include_path.
	 */
	public function test_include_path() {
		// Plugin Folder Path
		$expected = str_replace( 'tests/wp-tests/', '', plugin_dir_path( __FILE__ ) );
		$actual   = $this->object->include_path;

		$this->assertEquals( $expected, $actual );
	}

	/**
	 * Test translations.
	 */ 
	public function test_translations() {
		// Plugin Folder Path
		$expected  = str_replace( 'tests/wp-tests', '', dirname( plugin_basename( __FILE__ ) ) );
		$expected .= 'languages/';
		$actual    = $this->object->translations;

		$this->assertEquals( $expected, $actual );
	}

	/**
	 * Test included files.
	 */
	public function test_included_files() {
		$this->assertFileExists( $this->object->include_path . 'include/install.php' );
		$this->assertFileExists( $this->object->include_path . 'include/class-email-log-list-table.php' );
		$this->assertFileExists( $this->object->include_path . 'include/util/helper.php' );
	}
}
