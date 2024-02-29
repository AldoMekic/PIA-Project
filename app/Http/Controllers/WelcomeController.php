namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $post = Post::first(); 

        return view('welcome', compact('post'));
    }
}