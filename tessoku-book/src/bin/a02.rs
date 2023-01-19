use proconio::{fastout, input};

fn main() {
    input! {
        n: usize,
        x: usize,
        a: [usize;n],
    }
    let ans = if a.iter().any(|&i| i == x) { "Yes" } else { "No" };
    println!("{}", ans)
}
