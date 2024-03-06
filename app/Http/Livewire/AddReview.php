namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AddReview extends Component
{
    public $bookId;
    public $comment;
    public $rating;

    public function render()
    {
        return view('livewire.add-review');
    }

    public function submitReview()
    {
        $this->validate([
            'comment' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $this->bookId,
            'comment' => $this->comment,
            'rating' => $this->rating,
        ]);

        // Clear form fields
        $this->reset(['comment', 'rating']);

        session()->flash('message', 'Review added successfully!');
    }
}