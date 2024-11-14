// Assuming PHPUnit is used for testing
use PHPUnit\Framework\TestCase;

require_once 'RegisterScreen.php'; // Include the RegisterScreen class definition

class RegisterScreenTest extends TestCase
{
public function testSanitizeInputs()
{
$registerScreen = new RegisterScreen(); // Create an instance of the RegisterScreen class

$inputData = [
'usuario' => '
<script>alert("XSS")</script>',
'contrasena' => '
<script>alert("XSS")</script>',
'correo' => '
<script>alert("XSS")</script>',
'dni' => '
<script>alert("XSS")</script>',
'telefono' => '
<script>alert("XSS")</script>',
];

$expectedOutput = [
'usuario' => 'alert("XSS")',
'contrasena' => 'alert("XSS")',
'correo' => 'alert("XSS")',
'dni' => 'alert("XSS")',
'telefono' => 'alert("XSS")',
];

$sanitizedData = $registerScreen->sanitizeInputs($inputData);

$this->assertEquals($expectedOutput, $sanitizedData);
}
}