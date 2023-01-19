use proconio::{fastout, input};

#[fastout]
fn main() {
    input! {
        n: usize,
    }
    println!("{:0>10b}", n)
}
