use proconio::{fastout, input};

#[fastout]
fn main() {
    input! {
        n: i32,
        k: i32,
    }
    let mut ans = 0;
    for i in 1..=n {
        for j in 1..=n {
            let l = k - (i + j);
            if l >= 1 && l <= n {
                // println!("answer: {} {} {}", i, j, l);
                ans += 1
            }
        }
    }
    println!("{}", ans)
}
